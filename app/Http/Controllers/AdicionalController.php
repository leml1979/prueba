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
}
