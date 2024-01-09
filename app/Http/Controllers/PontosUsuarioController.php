<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\PontosUsuario;

class PontosUsuarioController extends Controller
{
    public function index()
    {
        $pontos = PontosUsuario::all();
        return response()->json(['pontos' => $pontos], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'municipio_id' => 'required|exists:municipios_geometria,id',
        ]);

        $ponto = PontosUsuario::create([
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'municipio_id' => $request->input('municipio_id'),
            'geom' => DB::raw("ST_GeomFromText('POINT($request->longitude $request->latitude)', 4326)"),
        ]);

        return response()->json(['ponto' => $ponto], 201);
    }

    public function show($id)
    {
        $ponto = PontosUsuario::find($id);

        if (!$ponto) {
            return response()->json(['error' => 'Ponto não encontrado.'], 404);
        }

        return response()->json(['ponto' => $ponto], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'municipio_id' => 'exists:municipios_geometria,id',
        ]);

        $ponto = PontosUsuario::find($id);

        if (!$ponto) {
            return response()->json(['error' => 'Ponto não encontrado.'], 404);
        }

        $ponto->update($request->all());

        return response()->json(['ponto' => $ponto], 200);
    }

    public function destroy($id)
    {
        $ponto = PontosUsuario::find($id);

        if (!$ponto) {
            return response()->json(['error' => 'Ponto não encontrado.'], 404);
        }

        $ponto->delete();

        return response()->json(['message' => 'Ponto removido com sucesso.'], 200);
    }
}
