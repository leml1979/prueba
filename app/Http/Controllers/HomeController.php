<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\MSujeto;
use App\Models\ESeniat;
use Str;

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
        $persona=null;
        if(Auth::user()->declaracion_jurada && (Auth::user()->respuesta_declaracion_jurada==null || Auth::user()->respuesta_declaracion_jurada!=='ESTOY DE ACUERDO')){
            return view('registro.declaracionJurada');
        }elseif(Auth::user()->declaracion_jurada && Auth::user()->respuesta_declaracion_jurada==='ESTOY DE ACUERDO'){
            return view('home');
        }else{
            return redirect()->route('login');
        }
        
    }

    /**
     * Crea el sujeto de aplicacion, actualiza el modelo user retorna al home o  declaracion jurada vista.
     *
     * @return void
     */

    public function guardarDeclaracion(Request $request){
        if($request->texto=="ESTOY DE ACUERDO"){
            Auth::user()->update(["respuesta_declaracion_jurada"=>$request->texto]); //actualiza el modelo user y la tablas users, ademas la variable de session de auth
            $senait = ESeniat::where("rif",Auth::user()->rif)->limit(1)->get("id");
            $sujeto = new MSujeto();
            $sujeto->rif = Auth::user()->rif;
            $sujeto->sujeto = Auth::user()->name;
            $sujeto->seniat_id=$senait[0]["id"];
            $sujeto->save();
            return redirect()->route('home');
        }elseif($request->texto=="NO ESTOY DE ACUERDO"){
            //actualiza la tabla y el modelos
            Auth::user()->update(["respuesta_declaracion_jurada"=>$request->texto]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }
}
