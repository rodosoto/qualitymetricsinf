<?php

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

Route::get('/reporte_pdf', [InformesController::class , 'reporte_pdf'])->name('pagina.reporte');

Route::get('/reporte/anio', [InformesController::class, 'reporte_anio'])->name('reporte_pdf');

Route::get('/datosMap', [ApiMapController::class, 'recibe'])->name('apimap.rest');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [CreaObjeto::class, 'dashboard'])->name('dashboard');

Route::get('/empresa', function() {
	return view('admin.addEmpresa');
})->name('add.empresa');

Route::get('/exito', [GeneralController::class, 'cargando'])->name('cargando');

Route::post('/empresa/add', [GeneralController::class, 'agrega_empresa'])->name('add.empresa.bd');

Route::get('/centro', [CreaObjeto::class, 'empresa'])->name('add.centro');

Route::post('/centro/add', [GeneralController::class, 'agrega_centro'])->name('add.centro.bd');

Route::get('/jaula', [CreaObjeto::class, 'empresa_centro'])->name('add.jaula');

Route::post('/jaula/add', [GeneralController::class, 'agrega_jaula'])->name('add.jaula.bd');

Route::get('centro/obt', [CreaObjeto::class, 'centro'] )->name('listado.centros');

Route::get('jaula/obt', [CreaObjeto::class, 'jaula'] )->name('listado.jaulas');

Route::get('/maquina', [CreaObjeto::class, 'centro_jaula'])->name('add.maquina');
Route::post('/maquina/add', [GeneralController::class, 'agrega_maquina'])->name('add.maquina.bd');

Route::post('/assigUser', [CreaObjeto::class, 'assigUser'])->name('assig.user');

Route::get('/maquina/assign', [CreaObjeto::class, 'assignMaquina'])->name('assign.maquina');

Route::get('empresa/obtME', [CreaObjeto::class, 'empresa_maquina'] )->name('listado.empresasM');

Route::get('empresa/obtMC', [CreaObjeto::class, 'centro_maquina'] )->name('listado.centrosM');

Route::get('empresa/obtMJ', [CreaObjeto::class, 'jaula_maquina'] )->name('listado.centrosM');

Route::get('/users/show', [CreaObjeto::class, 'user'])->name('show.users');
  
Route::get('/empresa/show', [CreaObjeto::class, 'empresa_show'])->name('show.empresas');
Route::get('/maquina/borra', [CreaObjeto::class, 'borra_maquina'])->name('borra.maquina');

Route::get('/empresa/borra', [CreaObjeto::class, 'borra_empresa'])->name('borra.empresa');

Route::post('/user/asigna/empresa', [CreaObjeto::class, 'asigna_user_empresa'])->name('asigna.user.empresa');

Route::get('/user/borra', [CreaObjeto::class, 'user_borra'])->name('user.borra');

Route::get('/jaula/borra', [CreaObjeto::class, 'jaula_borra'])->name('jaula.borra');

Route::get('/centro/borra', [CreaObjeto::class, 'centro_borra'])->name('centro.borra');

Route::get('/tabla/jaula/', [CreaObjeto::class, 'tabla_jaulas'] )->name('tabla.jaulas');

Route::get('/tabla/centro/', [CreaObjeto::class, 'tabla_centro'] )->name('tabla.centros');

Route::get('/graficos/filete/ce', [GraficosController::class, 'graficosBarra'] )->name('graficos.barra');

Route::get('/graficos/filete/ot', [GraficosController::class, 'graficosDonut'] )->name('graficos.donut');

Route::get('/graficos/filete/hem', [GraficosController::class, 'mapHematomas'] )->name('graficos.hem');

Route::get('/graficos/filete/gap', [GraficosController::class, 'mapGaping'] )->name('graficos.gap');

Route::get('/graficos/filete/mel', [GraficosController::class, 'mapMelanosis'] )->name('graficos.mel');

Route::get('informes/excel', [InformesController::class , 'medicion_filete'])->name('informes.filete');

Route::get('informes/pdf', [InformesController::class , 'medicion_filetePDF'])->name('informes.filetePDF');

Route::get('/reportes', [GeneralController::class, 'reportes'])->name('reportes');

Route::get('/reportes/fecha', [GeneralController::class, 'rellena_fecha'])->name('reportes.fecha');

Route::get('/reportes/mes', [GeneralController::class, 'rellena_mes'])->name('reportes.mes');

Route::get('/reportes/dia', [GeneralController::class, 'rellena_dia'])->name('reportes.dia');

Route::get('/reportes/centros', [GeneralController::class, 'rellena_centro'])->name('reportes.centro');

Route::get('/reportes/centros2', [GeneralController::class, 'rellena_centro2'])->name('reportes.centro2');

Route::get('/reportes/NombreCentros', [GeneralController::class, 'NombreCentro'])->name('reportes.Ncentro');

Route::get('/reportes/jaulas', [GeneralController::class, 'rellena_jaula'])->name('reportes.jaulas');

Route::get('/reportes/Limjaulas', [GeneralController::class, 'limitaPorJaula'])->name('reportes.limitaJaula');

Route::get('/reportes/donutGen', [GeneralController::class, 'donutGeneral'])->name('reportes.donutGen');

Route::get('/reportes/donutAnio', [GeneralController::class, 'donutAnio'])->name('reportes.donutAnio');

Route::get('/reportes/donutMes', [GeneralController::class, 'donutMes'])->name('reportes.donutMes');

Route::get('/reportes/donutDia', [GeneralController::class, 'donutDia'])->name('reportes.donutDia');

Route::get('/reportes/donutCentro', [GeneralController::class, 'donutCentro'])->name('reportes.donutCentro');

Route::get('/reportes/donutJaula', [GeneralController::class, 'donutJaula'])->name('reportes.donutJaula');

Route::get('/reporterapido/centros', [GeneralController::class, 'rellena_centros'])->name('reporterapido.centro');

Route::get('/reporterapido/anio1', [GeneralController::class, 'rellena_anio1'])->name('reporterapido.anio1');

Route::get('/reporterapido/anio2', [GeneralController::class, 'rellena_anio2'])->name('reporterapido.anio2');

Route::get('/reporterapido/mes1', [GeneralController::class, 'rellena_mes1'])->name('reporterapido.mes1');

Route::get('/reporterapido/mes2', [GeneralController::class, 'rellena_mes2'])->name('reporterapido.mes2');

Route::get('/reporterapido/dia1', [GeneralController::class, 'rellena_dia1'])->name('reporterapido.dia1');

Route::get('/reporterapido/dia2', [GeneralController::class, 'rellena_dia2'])->name('reporterapido.dia2');







