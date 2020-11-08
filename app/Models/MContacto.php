<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MContacto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tipo_documento',
        'documento_identificacion',
        'primer_apellido',
        'primer_nombre',
        'segundo_apellido',
        'segundo_nombre',
        'origen_dato',
        'rif',
    ];

    public function accionistas(){
    	return $this->hasMany('App\Models\RAccionistasEmpresa','contacto_id');
    }
}
