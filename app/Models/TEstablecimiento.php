<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TEstablecimiento extends Model
{
	use HasFactory;
	public $timestamps = false;

	public function estado()
	{
		return $this->belongsTo('App\Models\MEstado');
	}

	public function municipio()
	{
		return $this->belongsTo('App\Models\MMunicipio','municipio_id');
	}

	public function parroquia()
	{
		return $this->belongsTo('App\Models\MParroquia');
	}

	public function sujetos()
	{
		return $this->belongsTo('App\Models\MSujeto','sujeto_id');
	}

	public function tenencia()
	{
		return $this->belongsTo('App\Models\MTenencia','tenencia_id');
	}

	public function sede()
	{
		return $this->belongsTo('App\Models\MTiposSede','tipo_sede_id');
	}

	public function infraestrutura()
	{
		return $this->belongsTo('App\Models\MInfraestructura','infraestrutura_id');
	}

	public function relacionDependencia()
	{
		return $this->belongsTo('App\Models\MRelacionesDependencia','relacion_dependencia_id');
	}

	public function inmueble()
	{
		return $this->belongsTo('App\Models\Minmueble','inmueble_id');
	}

	public function contactos(){
    	return $this->hasMany('App\Models\RContactosEstablecimiento','establecimiento_id');
    }
}
