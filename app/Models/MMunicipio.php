<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMunicipio extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('App\Models\MEstado');
    }

    public function parroquias(){
    	return $this->hasMany('App\Models\MParroquia','municipio_id');
    }
}
