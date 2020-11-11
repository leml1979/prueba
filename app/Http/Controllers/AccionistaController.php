<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MSujeto;
use App\Models\MContacto;
use App\Models\RAccionistasEmpresa;
use App\Models\ESaime;
use App\Models\ESeniat;
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
        $request->validate([
            "tipo"=>"required|in:V,E,P,J,G,C,N",
            "documento_identidad"=>"required|min:8|max:10",
            "personalidad"=>"required",
            "pais"=>"required|exists:m_paises,id",
            "tipo_relacion_empresa"=>"required|exists:m_tipos_relacion_empresas,id",
            "cantidad_acciones"=>"required|numeric",
            "correo"=>"required|email:rfc,dns",
        ]);
        $sujeto= MSujeto::where("rif",Auth::user()->rif)->first();
        $accionista = new RAccionistasEmpresa();
        $accionista->cantidad_acciones = $request->cantidad_acciones;
        $accionista->pais_id = $request->pais;
        $accionista->personalidad_id = $request->personalidad;
        $accionista->correo = $request->correo;
        $accionista->tipo_relacion_empresa_id = $request->tipo_relacion_empresa;
        $accionista->sujeto_id = $sujeto->id;
        $accionista->usuario_creador_id=Auth::user()->id;
        $accionista->usuario_modificador_id=Auth::user()->id;
        if($request->tipo=='V' || $request->tipo=='E' || $request->tipo=='P'){
            $accionista->saime_id = $request->seniatsaime;
        }elseif($request->tipo=='G' || $request->tipo=='J' || $request->tipo=='N' || $request->tipo=='C'){
            $accionista->seniat_id = $request->seniatsaime;
        }
        if($accionista->save()){
            $sujeto->estatus_accionista=1;
            $sujeto->update();
            $mensaje="El(la) accionista se a registrado";
            flash($mensaje)->success()->important();
            return redirect()->route('accionista.index');
        }else{
            $mensaje="El(la) accionista no se a registrado";
            flash($mensaje)->error()->important();
            return redirect()->route('accionista.index');
        }
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
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->first();
        $accionista = RAccionistasEmpresa::find($id);
        $mensaje="El(la) Accionista  se a eliminado";
        $accionista->delete();
        $sujetoaccionista = RAccionistasEmpresa::where("sujeto_id",$sujeto->id)->count();
        if(!$sujetoaccionista){
            $sujeto->estatus_accionista=0;
            $sujeto->update();
        }
        flash($mensaje)->error()->important();
        return redirect()->route('accionista.index');
    }

    public function buscar(Request $request){
        if($request->tipo=="V" || $request->tipo=="E" || $request->tipo=="P"){
            $persona = ESaime::where(["cedula"=>$request->documento_identidad,"tipo"=>$request->tipo])->first();
                //dd($persona);
            if($persona){
                return [
                    "codigo"=>$persona->id_saime,
                    "nombre1"=>$persona->nombre1,
                    "nombre2" => $persona->nombre2,
                    "apellido1"=>$persona->apellido1,
                    "apellido2" => $persona->apellido2,
                    "encontrado" => 1,
                ];
            }else{
                return [
                    "codigo"=>"",
                    "nombre1"=>"",
                    "nombre2" => "",
                    "apellido1"=>"",
                    "apellido2" => "",
                    "encontrado" => 0,
                ]; 
            }
        }else{
            $persona = ESeniat::where(["rif"=>$request->tipo.$request->documento_identidad])->first();
            if($persona){
                return [
                    "codigo"=>$persona->id,
                    "nombre1"=>$persona->razon_social,
                    "nombre2" => "",
                    "apellido1"=>"",
                    "apellido2" => "",
                    "encontrado" => 1,
                ];
            }else{
                return [
                    "codigo"=>"",
                    "nombre1"=>"",
                    "nombre2" => "",
                    "apellido1"=>"",
                    "apellido2" => "",
                    "encontrado" => 0,
                ]; 
            }

        }
    }
}
