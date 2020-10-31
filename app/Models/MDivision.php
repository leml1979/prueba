<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDivision extends Model
{
    use HasFactory;

    protected $table='m_divisiones';
    public $timestamps = false;

    public function seccion()
    {
        return $this->belongsTo('App\Models\MSeccion');
    }
}
