<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPersonalidad extends Model
{
    use HasFactory;

    protected $table="m_personalidades";
    public $timestamps = false;


    public function accionistas(){
		return $this->hasMany('App\Models\RAccionistasEmpresa','personalidad_id');
	}
}
