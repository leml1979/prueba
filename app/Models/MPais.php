<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPais extends Model
{
    use HasFactory;
    protected $table='m_paises';
    public $timestamps = false;

    public function accionistas(){
		return $this->hasMany('App\Models\RAccionistasEmpresa','pais_id');
	}

	public function proveedores(){
		return $this->hasMany('App\Models\RProveedorSujeto','pais_id');
	}
    
}
