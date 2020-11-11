<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ESeniat extends Model
{
	use HasFactory;
	public $timestamps = false;

	public function accionista(){
		return $this->hasMany('App\Models\RAccionistasEmpresa','saime_id');
	}
}
