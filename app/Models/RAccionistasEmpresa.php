<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAccionistasEmpresa extends Model
{
    use HasFactory;

    protected $table="r_accionistas_empresas";
    public $timestamps = false;
    
    public function contactos()
    {
        return $this->belongsTo('App\Models\MContacto',"contacto_id");
    }

    public function personalidades()
    {
        return $this->belongsTo('App\Models\MPersonalidad','personalidad_id','id');
    }

    public function paises()
    {
        return $this->belongsTo('App\Models\MPais','pais_id');
    }

    public function sujetos()
    {
        return $this->belongsTo('App\Models\MSujeto','sujeto_id');
    }

    public function tiposRelacionEmpresas()
    {
        return $this->belongsTo('App\Models\MTiposRelacionEmpresa','tipo_relacion_empresa_id');
    }

    public function saime()
    {
        return $this->belongsTo('App\Models\ESaime','saime_id','id_saime');
    }

    public function seniat()
    {
        return $this->belongsTo('App\Models\ESeniat','seniat_id');
    }
}
