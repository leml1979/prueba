<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ESeniat;
use App\Models\MSujeto;
use Auth;

class SeniatController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:seniat.index', ['only' => ['index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosseniat = ESeniat::where('rif',Auth::user()->rif)->limit(1)->get();
        //dd($datosseniat);
        return view("informacion_general.seniat.listar",compact('datosseniat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
           'acuerdo'  => 'required|in:si,no',
       ]);
        $sujeto= MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        if($sujeto->count()){
            if($request->acuerdo=="no"){
                $sujeto->informacion_seniat=false;
                $sujeto->estatus_seniat=1;
                $mensaje="Debe dirigirse al SENIAT para actualizar sus datos";
                flash($mensaje)->warning()->important();
            }else{
                $sujeto->informacion_seniat=true;
                $sujeto->estatus_seniat=1;
                $mensaje="Actualizado satisfactoriamente";
                flash($mensaje)->success()->important(); 
            }
            
            if(!$sujeto->save()){
                flash("Intente nuevamente, no se registro su solicitud")->error()->important();
            }
        }else{
            flash("Intente nuevamente")->error()->important();
        }
        
        return redirect()->route('seniat'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
