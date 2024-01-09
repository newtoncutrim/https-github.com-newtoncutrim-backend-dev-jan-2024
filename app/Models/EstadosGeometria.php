<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosGeometria extends Model
{
    use HasFactory;

    protected $fillable = ['nome_estado', 'geom'];
    protected $casts = ['geom' => 'geometry'];
}
