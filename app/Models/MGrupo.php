<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MGrupo extends Model
{
    use HasFactory;
    public $incrementing = false;
	protected $keyType = 'string';
    public $timestamps = false;
    

    public function division()
    {
        return $this->belongsTo('App\Models\MDivision','division_id');
    }
}
