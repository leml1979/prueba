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
use App\Models\MEstatusEmpresa;
use Arr;


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
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->first();
        if($sujeto->estatus_adicional){

            return redirect()->route("adicional.edit",$sujeto->id);
        }
        else{
            return $redirect()->route("adicional");      }
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
        $estatus_empresa = MEstatusEmpresa::orderBy("estatu_empresa")->pluck("estatu_empresa","id");
        return view('informacion_general.informacion_adicional.agregar',compact("estados","municipios","parroquias","secciones","divisiones","grupos","clases","estatus_empresa"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->servicios=='0' &&  $request->comercializadora=='0' && $request->productora=='0' && $request->importadora=='0'  && $request->exportadora=='0' && $request->distribuidora=='0'){
            flash("No")->error();
            return back(); 
        }
        $rules=[
            "clase_id"=>"required|exists:m_clases,id",
            "division_id"=>"required|exists:m_divisiones,id",
            "grupo_id"=>"required|exists:m_grupos,id",
            "seccion_id"=>"required|exists:m_secciones,id",
            "estado"=>"required|exists:m_estados,id",
            "municipio"=>"required|exists:m_municipios,id",
            "parroquia"=>"required|exists:m_parroquias,id",
            "ciudad"=>"required",
            "productora"=>"required",
            "importadora"=>"required",
            "comercializadora"=>"required",
            "servicios"=>"required",
            "exportadora"=>"required",
            "distribuidora"=>"required",
            "punto_referencia"=>"required",
            "descripcion"=>"required",
            "zona_postal"=>"required|integer|min:4",
            "urbanizacion"=>"required",
            "avenida"=>"required",
        ];
        if($request->posse=='si'){
            $rules=Arr::add($rules, "numero_expediente","required");
            $rules=Arr::add($rules, "fecha_registro","required|date");
            $rules=Arr::add($rules, "tomo","required");
            $rules=Arr::add($rules, "folio","required");
            $rules=Arr::add($rules, "capital_pagado","required");
            $rules=Arr::add($rules, "capital_suscrito","required");
            $rules=Arr::add($rules, "explicacion_estatus","required");
            $rules=Arr::add($rules, "fecha_desde","required|date");
            $rules=Arr::add($rules, "estatus_empresa","required");
        }
        $request->validate($rules);


//dd($request->all());
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->first();
        if($request->posse=='si'){
            $sujeto->numero_registro = $request->numero_expediente;
            $sujeto->fecha_registros = $request->fecha_registro;
            $sujeto->nombre_comercial = $request->nombre_comercial;
            $sujeto->tomo = $request->tomo;
            $sujeto->folio = $request->folio;
            $sujeto->capital_pagado = $request->capital_pagado;
            $sujeto->capital_suscrito = $request->capital_suscrito;
            $sujeto->explicacion_estatus = $request->explicacion_estatus;
            $sujeto->fecha_estatus_desde = $request->fecha_desde;
            $sujeto->estatus_empresa_adicional_id=$request->estatus_empresa;
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
        $sujeto->exportadora=$request->exportadora;
        $sujeto->distribuidora=$request->distribuidora;
        $sujeto->punto_referencia=$request->punto_referencia;
        $sujeto->descripcion_actividad=$request->descripcion;
        $sujeto->zona_postal=$request->zona_postal;
        $sujeto->telefono=$request->telefono;
        $sujeto->urbanizacion_barrio=$request->urbanizacion;
        $sujeto->avenida=$request->avenida;
        $sujeto->fax=$request->fax;
        $sujeto->estatus_adicional=1;
        $sujeto->pagina_web=$request->sitio_internet;
        $sujeto->update();
        flash("informacion adicional, guardada exitosamente")->success();
        return redirect()->route("adicional.edit",$sujeto->id);
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
        $sujeto = MSujeto::find($id);
        $estados = MEstado::orderBy("estado")->pluck("estado","id");
        $municipios = MMunicipio::orderBy("municipio")->where("estado_id",$sujeto->estado_id)->pluck("municipio","id");
        $parroquias = MParroquia::orderBy("parroquia")->where("municipio_id",$sujeto->municipio_id)->pluck("parroquia","id");
        $secciones = MSeccion::orderBy("seccion")->pluck("seccion","id");
        $divisiones = MDivision::orderBy("division")->where("seccion_id",$sujeto->seccion_id)->pluck("division","id");
        $grupos = MGrupo::orderBy("grupo")->where("division_id",$sujeto->division_id)->pluck("grupo","id");
        $clases = MClase::orderBy("clase")->where("grupo_id",$sujeto->grupo_id)->pluck("clase","id");
        $estatus_empresa = MEstatusEmpresa::orderBy("estatu_empresa")->pluck("estatu_empresa","id");
        return view('informacion_general.informacion_adicional.editar',compact("estados","municipios","parroquias","secciones","divisiones","grupos","clases","estatus_empresa","sujeto"));
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
        $sujeto = MSujeto::find($id);
        if($request->servicios=='0' &&  $request->comercializadora=='0' && $request->productora=='0' && $request->importadora=='0' && $request->exportadora=='0' && $request->distribuidora=='0'){
            flash("No")->error();
            return back(); 
        }
        $rules=[
            "clase_id"=>"required|exists:m_clases,id",
            "division_id"=>"required|exists:m_divisiones,id",
            "grupo_id"=>"required|exists:m_grupos,id",
            "seccion_id"=>"required|exists:m_secciones,id",
            "estado"=>"required|exists:m_estados,id",
            "municipio"=>"required|exists:m_municipios,id",
            "parroquia"=>"required|exists:m_parroquias,id",
            "ciudad"=>"required",
            "productora"=>"required",
            "importadora"=>"required",
            "comercializadora"=>"required",
            "servicios"=>"required",
            "exportadora"=>"required",
            "distribuidora"=>"required",
            "punto_referencia"=>"required",
            "descripcion"=>"required",
            "zona_postal"=>"required|integer|min:4",
            "urbanizacion"=>"required",
            "avenida"=>"required",
        ];
        if($sujeto->numero_registro!=null){
            $rules=Arr::add($rules, "numero_expediente","required");
            $rules=Arr::add($rules, "fecha_registro","required|date");
            $rules=Arr::add($rules, "tomo","required");
            $rules=Arr::add($rules, "folio","required");
            $rules=Arr::add($rules, "capital_pagado","required");
            $rules=Arr::add($rules, "capital_suscrito","required");
            $rules=Arr::add($rules, "explicacion_estatus","required");
            $rules=Arr::add($rules, "fecha_desde","required|date");
            $rules=Arr::add($rules, "estatus_empresa","required");
        }
        $request->validate($rules);


//dd($request->all());
        if($sujeto->numero_registro!=null){
            $sujeto->numero_registro = $request->numero_expediente;
            $sujeto->fecha_registros = $request->fecha_registro;
            $sujeto->nombre_comercial = $request->nombre_comercial;
            $sujeto->tomo = $request->tomo;
            $sujeto->folio = $request->folio;
            $sujeto->capital_pagado = $request->capital_pagado;
            $sujeto->capital_suscrito = $request->capital_suscrito;
            $sujeto->explicacion_estatus = $request->explicacion_estatus;
            $sujeto->fecha_estatus_desde = $request->fecha_desde;
            $sujeto->estatus_empresa_adicional_id=$request->estatus_empresa;
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
        $sujeto->exportadora=$request->exportadora;
        $sujeto->distribuidora=$request->distribuidora;
        $sujeto->punto_referencia=$request->punto_referencia;
        $sujeto->descripcion_actividad=$request->descripcion;
        $sujeto->zona_postal=$request->zona_postal;
        $sujeto->telefono=$request->telefono;
        $sujeto->urbanizacion_barrio=$request->urbanizacion;
        $sujeto->avenida=$request->avenida;
        $sujeto->fax=$request->fax;
        $sujeto->estatus_adicional=1;
        $sujeto->pagina_web=$request->sitio_internet;
        $sujeto->update();
        flash("informacion adicional, guardada exitosamente")->success();
        return redirect()->route("adicional.edit",$sujeto->id);
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
