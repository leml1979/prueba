<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RProveedorSujeto extends Model
{
    use HasFactory;
    protected $table="r_proveedores_sujeto";
    public $timestamps = false;

    public function paises()
    {
        return $this->belongsTo('App\Models\MPais','pais_id');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Models\MProveedor','proveedor_id');
    }
}
