<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TEstablecimiento;
use App\Models\MSujeto;
use Storage;

class CertificadoValidarController extends Controller
{
	public function validarMatriz($codigo){
		$sujeto = MSujeto::where("codigo_certificado",$codigo)->first();

		$cierre=0;
		if($sujeto==null){
            //ningun valor encontrado
			flash("Certificado: el Sujeto de Aplicacion es invalido")->error();
			return view("certificado.certificadoValidar",compact("cierre"));
		}else{
			if($sujeto->estatus_culminacion_registro==1){
				$cierre=1;
				return view("certificado.certificadoValidar",compact("sujeto","cierre"));

			}else{
                //encontrado pero no terminado
				flash("Certificado: el Sujeto de Aplicacion invalido")->error();
				return view("certificado.certificadoValidar",compact("cierre"));
			} 

		}


	}
	public function validarEstablecimiento($codigo){
		$establecimiento = TEstablecimiento::where("codigo_certificado",$codigo)->first();

		$cierre=0;
		if($establecimiento==null){
            //ningun valor encontrado
			flash("Certificado: el establecimiento del Sujeto Aplicacion es invalido")->error();
			return view("certificado.certificadoEstablecimientoValidar",compact("cierre"));
		}else{
			if($establecimiento->cierre==1){
				$cierre=1;
				return view("certificado.certificadoEstablecimientoValidar",compact("establecimiento","cierre"));

			}else{
                //encontrado pero no terminado
				flash("Certificado: el establecimiento del Sujeto Aplicacion invalido")->error();
				return view("certificado.certificadoEstablecimientoValidar",compact("cierre"));
			} 

		}

	}
}