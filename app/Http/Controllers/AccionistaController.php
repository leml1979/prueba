<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MSujeto;
use App\Models\MContacto;
use App\Models\RAccionistasEmpresa;
use App\Models\ESaime;
use App\Models\MPais;
use App\Models\MPersonalidad;
use App\Models\MTiposRelacionEmpresa;


class AccionistaController extends Controller
{
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
        //$sujeto = MSujeto::find("rif",Auth::user()->rif);
        
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        $accionistas = RAccionistasEmpresa::where("sujeto_id",$sujeto->id)->get();
       // dd($accionistas);
        
        return view("informacion_general.accionistas.listar", compact("accionistas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = MPais::orderBy("pais")->pluck("pais","id");
        $personalidades = MPersonalidad::orderBy("id")->pluck("personalidad", "id");
        $tipoRelacionEmpresa = MTiposRelacionEmpresa::orderBy("id")->pluck("tipo_relacion_empresa","id");
        return view("informacion_general.accionistas.agregar",compact("paises","personalidades","tipoRelacionEmpresa"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscar(Request $request){
       // dd($request->all());
        $persona = ESaime::where(["cedula"=>$request->documento_identidad,"tipo"=>$request->tipo])->firstOrFail();
        $encontrado=true;$paises = MPais::orderBy("pais")->pluck("pais","id");
        $personalidades = MPersonalidad::orderBy("id")->pluck("personalidad", "id");
        $tipoRelacionEmpresa = MTiposRelacionEmpresa::orderBy("id")->pluck("tipo_relacion_empresa","id");
        $mensaje=true;
        return view("informacion_general.accionistas.agregar",compact("paises","personalidades","tipoRelacionEmpresa","persona","mensaje"));
    }
}
