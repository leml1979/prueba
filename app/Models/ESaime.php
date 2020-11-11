<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ESaime extends Model
{
    use HasFactory;

    protected $table="e_saime";
    public $timestamps = false;
    public $primarykey="id_saime";


    public function accionista(){
		return $this->hasMany('App\Models\RAccionistasEmpresa','saime_id');
	}
    
}
