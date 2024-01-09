<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipiosGeometria extends Model
{
    use HasFactory;

    protected $fillable = ['nome_municipio', 'geom'];
    protected $casts = ['geom' => 'geometry'];
}
