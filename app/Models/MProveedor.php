<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProveedor extends Model
{
	use HasFactory;
	protected $table="m_proveedores";
	public $timestamps = false;


	public function sujetos(){
		return $this->hasMany('App\Models\RProveedorSujeto','proveedor_id');
	}
}
