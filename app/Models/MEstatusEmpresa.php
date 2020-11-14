<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MEstatusEmpresa extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function proveedores(){
		return $this->hasMany('App\Models\RProveedorSujeto','pais_id');
	}

	public function sujeto(){
		return $this->hasMany('App\Models\MSujeto','estatus_empresa_adicional_id');
	}

}
