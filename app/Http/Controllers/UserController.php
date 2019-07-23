<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {

            return datatables()->of(User::latest()->get())
                ->addColumn('rol', function($row){
                    $roles=Role::all();
                    $salida="";
                    foreach ($roles as $key => $role) {
                        if ($row->hasAnyRole($role->name)) {
                            $salida.=$role->name.'   ';
                        }
                    }
                    return $salida;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a id="ver'.$row->id.'"  href="'.route('users.edit', $row->id).'" class="edit btn btn-primary btn-sm">Acceder</a>';
                   

                    return $btn;
                })
                ->rawColumns(['action', 'rol'])
                ->make(true);
        }
 
        return view('users.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (Auth::user()->id==$id){
           return redirect()->route('users.index');
       }
       return view('users.edit')->with(['user'=>User::find($id), 'roles'=>Role::all()]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->id==$id){
            return redirect()->route('users.index');
        }
        $user=User::find($id);
        $user->roles()->sync($request->roles);

        return view('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);

        $user->delete();
        return view('users.index');
    }
}
