<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDivision extends Model
{
    use HasFactory;

    protected $table='m_divisiones';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function seccion()
    {
        return $this->belongsTo('App\Models\MSeccion');
    }
    public function grupos(){
		return $this->hasMany('App\Models\MGrupo','MDivision_id');
	}
}
