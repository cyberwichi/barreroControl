<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Caffeinated\Shinobi\Middleware\UserHasAnyRole;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin', 'user')) {
            return view('home2');
        } else {
            return view('home');
        }
    }
    public function fichar(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin', '']);
        
        return view('home2');
    }
}
