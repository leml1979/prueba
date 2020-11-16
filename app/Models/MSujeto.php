<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSujeto extends Model
{
	use HasFactory;
	public $timestamps = false;
	
	public function estatus_empresa()
	{
		return $this->belongsTo('App\Models\MEstatusEmpresa','estatus_empresa_adicional_id');
	}
	public function estado()
	{
		return $this->belongsTo('App\Models\MEstado');
	}
	public function municipio()
	{
		return $this->belongsTo('App\Models\MMunicipio');
	}
	public function parroquia()
	{
		return $this->belongsTo('App\Models\MParroquia','parroquia_id');
	}
	public function tenencia()
	{
		return $this->belongsTo('App\Models\MTenencia','tenencia_id');
	}
	public function clase()
	{
		return $this->belongsTo('App\Models\MClase','clase_id');
	}
}
