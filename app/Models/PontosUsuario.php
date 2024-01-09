<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PontosUsuario extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude', 'municipio_id', 'geom'];
    protected $casts = ['geom' => 'geometry'];
}
