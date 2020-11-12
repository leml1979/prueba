<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\TEstablecimiento;
use App\Models\MSujeto;
use App\Models\ESeniat;
use App\Models\MEstado;
use App\Models\MMunicipio;
use App\Models\MParroquia;
use App\Models\MInmueble;
use App\Models\MTenencia;
use App\Models\MTiposSede;
use App\Models\MInfraestructura;
use App\Models\MRelacionesDependencia;


class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        $establecimientos = TEstablecimiento::where("sujeto_id",$sujeto->id)->get();
        return view("establecimiento.listar", compact("establecimientos"));
        
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
        $tenencias = MTenencia::orderBy("tenencia")->pluck("tenencia","id");
        $inmuebles = MInmueble::orderBy("inmueble")->pluck("inmueble","id");
        $tipoSedes = MTiposSede::orderBy("sede")->pluck("sede","id");
        $infraestructuras = MInfraestructura::orderBy("infraestructura")->pluck("infraestructura","id");
        $relacion_dependencia = MRelacionesDependencia::orderBy("relacion_dependencia")->pluck("relacion_dependencia","id");
        return view("establecimiento.agregar",compact("estados","municipios","parroquias","tenencias","inmuebles","tipoSedes","infraestructuras","relacion_dependencia"));
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
            "tipo_sede"=>"required|exists:m_tipos_sedes,id",
            "establecimiento"=>"required",
            "tipo_establecimiento"=>"required|exists:m_infraestructuras,id",
            "relacion_dependencia"=>"required|exists:m_relaciones_dependencias,id",
            "actividad"=>"required",
            "estado"=>"required|exists:m_estados,id",
            "municipio"=>"required|exists:m_municipios,id",
            "parroquia"=>"required|exists:m_parroquias,id",
            "ciudad"=>"required",
            "zona_postal"=>"required|integer",
            "avenida"=>"required",
            "urbanizacion"=>"required",
            "punto_referencia"=>"required",
            "tenencia"=>"required|exists:m_tenencias,id",
            "tipo_inmueble"=>"required|exists:m_tenencias,id",
            "nombre_inmueble"=>"required",
            "capacidad"=>"numeric",
            "apartamento"=>"required",
        ]);
        $sujeto= MSujeto::where("rif",Auth::user()->rif)->first();
        $establecimiento = new TEstablecimiento();
        $establecimiento->establecimiento = mb_strtoupper($request->establecimiento,"UTF-8");
        $establecimiento->actividad = mb_strtoupper($request->actividad,"UTF-8");
        $establecimiento->capacidad = $request->capacidad;
        $establecimiento->nombre_inmueble = mb_strtoupper($request->nombre_inmueble,"UTF-8");
        $establecimiento->apartamento_oficina = mb_strtoupper($request->apartamento,"UTF-8");
        $establecimiento->avenida = mb_strtoupper($request->avenida,"UTF-8");
        $establecimiento->urbanizacion_barrio = mb_strtoupper($request->urbanizacion,"UTF-8");
        $establecimiento->tipo_sede_id = $request->tipo_sede;
        $establecimiento->infraestructura_id = $request->tipo_establecimiento;
        $establecimiento->relacion_dependencia_id = $request->relacion_dependencia;
        $establecimiento->estado_id = $request->estado;
        $establecimiento->municipio_id = $request->municipio;
        $establecimiento->parroquia_id = $request->parroquia;
        $establecimiento->ciudad = mb_strtoupper($request->ciudad,"UTF-8");
        $establecimiento->zona_postal = $request->zona_postal;
        $establecimiento->punto_referencia = mb_strtoupper($request->punto_referencia,"UTF-8");
        $establecimiento->tenencia_id = $request->tenencia;
        $establecimiento->inmueble_id = $request->tipo_inmueble;
        $establecimiento->id_usuario_creador = Auth::user()->id;
        $establecimiento->id_usuario_modificador = Auth::user()->id;
        $establecimiento->sujeto_id = $sujeto->id;
        $establecimiento->estatus=0;
        $establecimiento->estatus_contacto=0;
        if($establecimiento->save()){
            $sujeto->estatus_establecimiento = 1;
            $sujeto->update();
            $mensaje="El Establecimiento ".$request->establecimiento." se a registrado";
            flash($mensaje)->success()->important();
            return redirect()->route('establecimiento.index');
        }else{
            $mensaje="El Establecimiento no se a registrado, intente nuevamente";
            flash($mensaje)->error()->important();
            return redirect()->route('establecimiento.index');
        }
        dd($request->all());
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

}
