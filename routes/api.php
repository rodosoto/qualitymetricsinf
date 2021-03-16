<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CreaObjeto;
use App\Http\Controllers\CreaEmpresaController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\InformesController;


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

Route::get('/datos', [ApiController::class, 'recibe'])->name('api.rest');