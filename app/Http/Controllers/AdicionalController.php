<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MEstado;
use App\Models\MMunicipio;
use App\Models\MParroquia;
use App\Models\MSeccion;
use App\Models\MGrupo;
use App\Models\MDivision;
use App\Models\MClase;
use App\Models\MSujeto;

class AdicionalController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = MEstado::orderBy("estado")->pluck("estado","id");
        $municipios = MMunicipio::orderBy("municipio")->pluck("municipio","id");
        $parroquias = MParroquia::orderBy("parroquia")->pluck("parroquia","id");
        $secciones = MSeccion::orderBy("seccion")->pluck("seccion","id");
        $divisiones = MDivision::orderBy("division")->pluck("division","id");
        $grupos = MGrupo::orderBy("grupo")->pluck("grupo","id");
        $clases = MClase::orderBy("clase")->pluck("clase","id");
        return view('informacion_general.informacion_adicional.agregar',compact("estados","municipios","parroquias","secciones","divisiones","grupos","clases"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->first();
        if($request->posse=='si'){
            $sujeto->numero_registro = $request->numero_expediente;
            $sujeto->fecha_registro = $request->fecha_registro;
            $sujeto->nombre_comercial = $request->nombre_comercial;
            $sujeto->tomo = $request->tomo;
            $sujeto->folio = $request->folio;
            $sujeto->capital_pagado = $request->capital_pagado;
            $sujeto->capital_suscrito = $request->capital_suscrito;
            $sujeto->explicacion_estatus = $request->explicacion_estatus;
            $sujeto->fecha_estatus = $request->fecha_desde;
        }
        $sujeto->clase_id=$request->clase_id;
        $sujeto->division_id=$request->division_id;
        $sujeto->grupo_id=$request->grupo_id;
        $sujeto->seccion_id=$request->seccion_id;
        $sujeto->estado_id=$request->estado;
        $sujeto->municipio_id=$request->municipio;
        $sujeto->parroquia_id=$request->parroquia;
        $sujeto->ciudad=$request->ciudad;
        $sujeto->productora=$request->productora;
        $sujeto->importadora=$request->importadora;
        $sujeto->comercializadora=$request->comercializadora;
        $sujeto->servicios=$request->servicios;
        $sujeto->punto_referencia=$request->punto_referencia;
        $sujeto->descripcion_actividad=$request->descripcion;
        $sujeto->zona_postal=$request->zona_postal;
        $sujeto->telefono=$request->telefono;
        $sujeto->urbanizacion_barrio=$request->urbanizacion;
        $sujeto->avenida=$request->avenida;
        $sujeto->fax=$request->fax;
        $sujeto->estatus_empresa=$request->estatus_empresa;
        dd($sujeto);
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
    public function municipio(Request $request){
        $municipios = MMunicipio::orderBy('municipio')->where("estado_id",$request->id_estado)->get();
        echo "<option value=''>Seleccione....</option>";
        foreach ($municipios as $resMuni) {
            echo "<option value='" . $resMuni->id . "'>" . $resMuni->municipio . "</option>";
        }
    }

    public function parroquia(Request $request){
        $parroquias = MParroquia::orderBy('parroquia')->where("municipio_id",$request->id_municipio)->get();
        echo "<option value=''>Seleccione....</option>";
        foreach ($parroquias as $resParroquia) {
            echo "<option value='" . $resParroquia->id . "'>" . $resParroquia->parroquia . "</option>";
        }
    }

    public function divisiones(Request $request){
        $divisiones = MDivision::orderBy('division')->where("seccion_id",$request->seccion_id)->get();
        echo "<option value=''>Seleccione....</option>";
        foreach ($divisiones as $resDivisiones) {
            echo "<option value='" . $resDivisiones->id . "'>" . $resDivisiones->division . "</option>";
        }
    }

    public function grupos(Request $request){
        $grupos = MGrupo::orderBy('grupo')->where("division_id",$request->divisiones_id)->get();
        echo "<option value=''>Seleccione....</option>";
        foreach ($grupos as $resGrupos) {
            echo "<option value='" . $resGrupos->id . "'>" . $resGrupos->grupo . "</option>";
        }
    }

    public function clases(Request $request){
        $clases = MClase::orderBy('clase')->where("grupo_id",$request->grupo_id)->get();
        echo "<option value=''>Seleccione....</option>";
        foreach ($clases as $resclase) {
            echo "<option value='" . $resclase->id . "'>" . $resclase->clase . "</option>";
        }
    }

}
