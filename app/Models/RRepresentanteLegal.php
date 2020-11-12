<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRepresentanteLegal extends Model
{
    use HasFactory;

    protected $table="r_representantes_legales";
    public $timestamps = false;

    public function sujetos()
    {
        return $this->belongsTo('App\Models\MSujeto','sujeto_id');
    }

    public function saime()
    {
        return $this->belongsTo('App\Models\ESaime','saime_id','id_saime');
    }
}
