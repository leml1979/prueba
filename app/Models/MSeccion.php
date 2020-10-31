<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSeccion extends Model
{
	use HasFactory;

	protected $table='m_secciones';
	public $incrementing = false;
	protected $keyType = 'string';

	public function divisiones(){
		return $this->hasMany('App\Models\MDivision','seccion_id');
	}
}
