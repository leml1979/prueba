<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    public function index()
    {
        
        if(Auth::user()->declaracion_jurada && (Auth::user()->texto_declaracion_jurada==null || Auth::user()->texto_declaracion_jurada==='NO ESTOY DE ACUERDO')){
            return view('registro.declaracionJurada');
        }elseif(Auth::user()->declaracion_jurada && Auth::user()->texto_declaracion_jurada==='ESTOY DE ACUERDO'){
            return view('home');
        }
        dd(Auth::user());
    }
}
