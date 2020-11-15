<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use QrCode;
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
use Carbon\Carbon;

class CertificadoController extends Controller
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
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        $establecimientos=[];
        if($sujeto->estatus_adicional==0){
            $estatus="Debe Completar la Información Adicional";
            return view("certificado.estatus",compact("estatus"));
        } elseif ($sujeto->estatus_accionista==0) {
            $estatus="Debe Completar la Información Accionista";
            return view("certificado.estatus",compact("estatus"));
        }elseif ($sujeto->estatus_establecimiento==0) {
            $estatus="Debe Completar la Información Establecimientos";
            return view("certificado.estatus",compact("estatus"));
        }elseif ($sujeto->estatus_representante_legal==0) {
            $estatus="Debe Completar la Información Representante Legal";
            return view("certificado.estatus",compact("estatus"));
        }elseif ($sujeto->estatus_seniat==0 ) {
         $estatus="Debe Completar la Información Representante Legal";
         return view("certificado.estatus",compact("estatus"));
     } 
     $establecimientos = TEstablecimiento::where("sujeto_id",$sujeto->id)->get();
     return view("certificado.listar", compact("establecimientos","sujeto"));
        //return view("certificado.index");
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

    public function pdf(){
        $sujeto = MSujeto::where("rif", Auth::user()->rif)->get();
        $qrcode = base64_encode(QrCode::format('png')->size(100)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadView('certificado.pdf', compact("sujeto","qrcode"));

      // download PDF file with download method
        return $pdf->download('certificado.pdf');
    }

    public function pdfEstablecimiento($id){
        //$sujeto = MSujeto::where("rif", Auth::user()->rif)->get();
        $establecimiento = TEstablecimiento::find($id);
        Carbon::setLocale('es');
        $fecha = Carbon::now();
        $fecha->diffForHumans();
        $qrcode = base64_encode(QrCode::format('png')->size(100)->errorCorrection('H')->generate($establecimiento->codigo_certificado));
        $pdf = PDF::loadView('certificado.pdfEstablecimiento', compact("establecimiento","qrcode","fecha"));

      // download PDF file with download method
        return $pdf->download('certificadoEstablecimiento_'.$establecimiento->establecimiento.'.pdf');
    }

    public function certificarEstablecimiento($id){
        $establecimientos = TEstablecimiento::find($id);
        $establecimientos->certificado=1;
        try{
            $establecimientos->update(); 
            flash("Certificado el Establecimiento ". $establecimientos->establecimiento )->success();
            return redirect()->back();
        }catch(\Illuminate\Database\QueryException $e){
            flash("No se pudo certificar el registro")->error();
            return redirect()->back();
        } catch (PDOException $e) {
            flash("No se pudo certificar el registro")->error();
            return redirect()->back();
        }   
        
        dd($id);
    }
}
