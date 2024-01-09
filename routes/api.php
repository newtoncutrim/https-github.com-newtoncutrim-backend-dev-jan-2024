<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/web.php ou routes/api.php


use App\Http\Controllers\PontosUsuarioController;
use App\Http\Controllers\LocalizarMunicipioController;

Route::post('/localizar', [LocalizarMunicipioController::class, 'localizarMunicipio']);

Route::apiResource('/pontos', PontosUsuarioController::class);
