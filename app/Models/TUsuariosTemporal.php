<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUsuariosTemporal extends Model
{
    use HasFactory;
    protected $table='t_usuarios_temporal';
	public $timestamps = false;

	protected $fillable = [
        'rif',
        'email',
        'hash',
        'estatus',
        'seniat_id',
    ];
	
}
