<?php

namespace App\Http\Controllers;

use App\Horario;
use App\User;
use App\Ficha;
use App\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class HorarioController extends Controller
{
    public function consultaFichas()
    {
        $nams = User::get();
        return view('horarios.menufichas')->with('users', $nams);
    }

    public function consultaSemana(Request $request )
    {
        $users = User::get();
        $horas=Horario::where('fecha', $request->fechaForm)->get();
        return view('horarios.fichasemana', compact('users', 'horas'));

    }
    public function fichasUsuarios(Request $request)
    {
      
        $user=User::find($request->nombreForm);
        $horas=Horario::where('user_id', $request->nombreForm)->get();
        $fichas=Ficha::where('user_id', $request->nombreForm)->get();

        return view('horarios.estadisticasfichas', compact('user', 'fichas', 'horas'));
    }

    public function horasUsuarios(Request $request)
    {
      
        $user=User::find($request->nombreForm);
        $horas=Horario::where('user_id', $request->nombreForm)->get();
        $fichas=Ficha::where('user_id', $request->nombreForm)->get();

        return view('horarios.estadisticashoras', compact('user', 'fichas', 'horas'));
    }
    public function consultaHoras()
    {
        $nams = User::get();
        return view('horarios.menuhoras')->with('users', $nams);
    }

    public function miHorario($id, $sem, Response $response)
    {

        if (request()->ajax()) {
            $nam = Horario::where('user_id', $id)
                ->where('fecha', $sem)
                ->get();
        }
        $response = $nam;
        return $response;
    }
    public function inicioMiHorario($id, Request $datetimeInicio)
    {


        $nam = new Ficha;
        $nam->user_id = $id;
        $pepe = date($datetimeInicio->datetimeInicio);
        $nam->toque = $pepe;
        $nam->tipo = "inicio";
        $nam->save();
        $datetimeInicio->session()->flash("status", 'Ok turno iniciado');




        return redirect()->route('fichar')->with($datetimeInicio->session()->get("status"));
    }
    public function finalMiHorario($id, Request $datetimeInicio)
    {
        $nam = new Ficha;
        $nam->user_id = $id;
        $pepe = date($datetimeInicio->datetimeFinal);
        $nam->toque = $pepe;
        $nam->tipo = "final";
        $nam->save();



        return redirect()->route('fichar')->with('status', '');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */
    public function index()

    {


        if (request()->ajax()) {

            return datatables()->of(Horario::latest()->get())
                ->addColumn('username', function ($row) {
                    $nam = User::where('id', $row->user_id)->firstOrFail();
                    return $nam->name;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a id="ver' . $row->id . '"  href="' . route('horarios.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Acceder</a>';
                    return $btn;
                })
                ->rawColumns(['username', 'action'])
                ->make(true);
        }

        return view('horarios.index')->with(['status' => 'holaaaa']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horarios.create')->with(['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hora = new Horario;
        $hora->user_id = $request->get('nombreForm');
        $hora->fecha = $request->get('fechaForm');
        $hora->dia = $request->get('diaForm');
        $hora->turno = $request->get('turnoForm');
        $hora->save();

        return view('horarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('horarios.edit')->with(['horario' => Horario::find($id), 'users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $hora = Horario::find($id);
        $hora->user_id = $request->get('nombreForm');
        $hora->fecha = $request->get('fechaForm');
        $hora->dia = $request->get('diaForm');
        $hora->turno = $request->get('turnoForm');
        $hora->update();

        return view('horarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hora = Horario::findOrFail($id);

        $hora->delete();
        return view('horarios.index');
    }
}
