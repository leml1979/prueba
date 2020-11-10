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
use DB;


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
        $sujeto= MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        DB::transaction(function() use ($request,$sujeto){
            $contacto = new MContacto();
            $accionista = new RAccionistasEmpresa();
            $contacto->tipo_documento=$request->tipo_documento;
            $contacto->documento_identificacion = $request->documento_identificacion;
            $contacto->primer_apellido = $request->primer_apellido;
            $contacto->primer_nombre = $request->primer_nombre;
            $contacto->segundo_apellido = $request->segundo_apellido;
            $contacto->segundo_nombre = $request->segundo_nombre;
            $contacto->id_usuario_creador = Auth::user()->id;
            $contacto->id_usuario_modificador = Auth::user()->id;
            $contacto->rif=$request->rif;
            $contacto->save();

            $accionista->cantidad_acciones = $request->cantidad_acciones;
            $accionista->contacto_id = $contacto->id;
            $accionista->pais->id = $request->pais;
            $accionista->personalidad_id = $request->personalidad;
            $accionista->correo = $request->correo;
            $accionista->tipo_relacion_empresa_id = $request->tipo_relacion_empresa;
            $accionista->seniat_id = Auth::user()->seniat_id;
            $accionista->sujeto_id = $sujeto->id;
            $accionista->save();
        });
        

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
