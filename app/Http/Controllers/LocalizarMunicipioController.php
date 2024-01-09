<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MunicipiosGeometria;

class LocalizarMunicipioController extends Controller
{
    public function localizarMunicipio(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $municipio = MunicipiosGeometria::whereRaw("ST_Contains(geom, ST_GeomFromText('POINT($longitude $latitude)', 4326))")
            ->first();

        if (!$municipio) {
            return response()->json(['error' => 'Município não encontrado.'], 404);
        }

        return response()->json(['municipio' => $municipio], 200);
    }
}
