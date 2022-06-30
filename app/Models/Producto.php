<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function precios() {
        return $this->hasOne('App\Models\Precio','producto_id');
    }
}
