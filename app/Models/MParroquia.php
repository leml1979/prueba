<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MParroquia extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function municipio()
    {
        return $this->belongsTo('App\Models\MMunicipio');
    }
}
