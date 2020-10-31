<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MEstado extends Model
{
	use HasFactory;
	public $timestamps = false;
	public function municipios(){
		return $this->hasMany('App\Models\MMunicipio','estado_id');
	}
}
