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
use Storage;
use Str;

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
        $persona="JURIDICA";
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        if(Str::startsWith(Auth::user()->rif,['V','E','P'])){
            $persona="NATURAL";
        }
        if($sujeto->estatus_adicional==0){
            $estatus="Debe Completar la Información Adicional";
            return view("certificado.estatus",compact("estatus"));
        } elseif ($sujeto->estatus_accionista==0 &&  $persona=="JURIDICA") {
            $estatus="Debe Completar la Información Accionista";
            return view("certificado.estatus",compact("estatus"));
        }elseif ($sujeto->estatus_establecimiento==0) {
            $estatus="Debe Completar la Información Establecimientos";
            return view("certificado.estatus",compact("estatus"));
        }elseif ($sujeto->estatus_representante_legal==0 && $persona=="JURIDICA") {
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

    public function pdf(){
        $sujeto = MSujeto::where("rif", Auth::user()->rif)->first();
        //dd($sujeto);
        $qrcode = base64_encode(QrCode::format('png')->size(100)->errorCorrection('H')->generate("www.sundde.gob.ve/rupdae/".$sujeto->codigo_certificado));
        Carbon::setLocale('es');
        $fecha = Carbon::now();
        $fecha->diffForHumans();
        $pdf = PDF::loadView('certificado.pdf', compact("sujeto","qrcode","fecha"));

      // download PDF file with download method
        return $pdf->download('certificado.pdf');
    }

    public function pdfEstablecimiento($id){
            //$sujeto = MSujeto::where("rif", Auth::user()->rif)->get();
        $establecimiento = TEstablecimiento::find($id);
        Carbon::setLocale('es');
        $fecha = Carbon::now();
        $fecha->diffForHumans();
        $qrcode = base64_encode(QrCode::format('png')->size(100)->errorCorrection('H')->generate("www.sundde.gob.ve/rupdae/".$establecimiento->codigo_certificado));
        $pdf = PDF::loadView('certificado.pdfEstablecimiento', compact("establecimiento","qrcode","fecha"));

          // download PDF file with download method
        return $pdf->download('certificadoEstablecimiento_'.$establecimiento->establecimiento.'.pdf');
    }

    public function certificarEstablecimiento($id){
        $establecimientos = TEstablecimiento::find($id);
        $establecimientos->cierre=1;
        try{
            $establecimientos->update(); 
            flash("Certificado el Establecimiento ". $establecimientos->establecimiento )->success();
            return redirect()->back();
        }catch(\Illuminate\Database\QueryException $e){
            Storage::put('logcertificado'.Carbon::now().'.txt', $e->getMessage());
            flash("No se pudo certificar el registro")->error();
            return redirect()->back();
        } catch (PDOException $e) {
            Storage::put('logcertificado'.Carbon::now().'.txt', $e->getMessage());
            flash("No se pudo certificar el registro")->error();
            return redirect()->back();
        }  
    }
    public function certificarSujeto($id){
        $sujeto = MSujeto::find($id);
        $sujeto->estatus_culminacion_registro=1;
        try{
            $sujeto->update(); 
            flash("Certificado el Sujeto de Aplicacion ". $sujeto->sujeto )->success();
            return redirect()->back();
        }catch(\Illuminate\Database\QueryException $e){
            Storage::put('logcertificado'.Carbon::now().'.txt', $e->getMessage());
            flash("No se pudo certificar el registro")->error();
            return redirect()->back();
        } catch (PDOException $e) {
            Storage::put('logcertificado'.Carbon::now().'.txt', $e->getMessage());
            flash("No se pudo certificar el registro")->error();
            return redirect()->back();
        }   

    }
}
