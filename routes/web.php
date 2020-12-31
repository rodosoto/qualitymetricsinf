<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CreaObjeto;
use App\Http\Controllers\CreaEmpresaController;
use App\Http\Controllers\UbicacionController;
use GuzzleHttp\Client;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/datos', [ApiController::class, 'recibe'])->name('api.rest');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [GeneralController::class, 'maquina_ver'])->name('dashboard');

Route::get('/empresa', function() {
	return view('admin.addEmpresa');
})->name('add.empresa');

Route::post('/empresa/add', [GeneralController::class, 'agrega_empresa'])->name('add.empresa.bd');

Route::get('/centro', [CreaObjeto::class, 'empresa'])->name('add.centro');

Route::post('/centro/add', [GeneralController::class, 'agrega_centro'])->name('add.centro.bd');

Route::get('/jaula', [CreaObjeto::class, 'empresa_centro'])->name('add.jaula');

Route::post('/jaula/add', [GeneralController::class, 'agrega_jaula'])->name('add.jaula.bd');

Route::get('centro/obt', [CreaObjeto::class, 'centro'] )->name('listado.centros');

Route::get('jaula/obt', [CreaObjeto::class, 'jaula'] )->name('listado.jaulas');

Route::get('/maquina', [CreaObjeto::class, 'centro_jaula'])->name('add.maquina');
Route::post('/maquina/add', [GeneralController::class, 'agrega_maquina'])->name('add.maquina.bd');

Route::get('/users/show', [CreaObjeto::class, 'user'])->name('show.users');

Route::get('/empresa/show', [CreaObjeto::class, 'empresa_show'])->name('show.empresas');