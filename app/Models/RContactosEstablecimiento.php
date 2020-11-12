<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RContactosEstablecimiento extends Model
{
    use HasFactory;

    protected $table = "r_contactos_establecimientos";
    public $timestamps = false;

    public function saime()
    {
        return $this->belongsTo('App\Models\ESaime','saime_id','id_saime');
    }
    public function establecimiento(){
		return $this->belongsTo('App\Models\TEstablecimiento','establecimiento_id');
	}
}
