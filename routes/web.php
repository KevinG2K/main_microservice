<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
/* Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'main'])->name('base'); */
Route::get('/contactus', [ContactusController::class, 'contactus'])->name('contactus');
Route::get('/gerentes', [GerenteController::class, 'gerentes'])->name('gerentes');
Route::get('/perfil', [GerenteController::class, 'perfil'])->name('perfil_gerente');
Route::get('/inmuebles', [InmuebleController::class, 'inmuebles'])->name('inmuebles');
Route::get('/asesores', [AsesorController::class, 'asesores'])->name('asesores');
Route::get('/transacciones', [TransaccionController::class, 'transacciones'])->name('transacciones');

// *********** API ********* //
Route::get('/bussiness', [ApiController::class, 'bussiness'])->name('bussiness');

Route::post('/regInmueble', [ApiController::class, 'regInmueble'])->name('regInmueble');
Route::get('/setAllDatos', [ApiController::class, 'setAllDatos'])->name('setAllDatos');
Route::get('/callInmueble', [ApiController::class, 'callInmueble'])->name('callInmueble');
Route::get('/getLastInmueble', [ApiController::class, 'getLastInmueble'])->name('getLastInmueble');

Route::post('/regTransaccion', [ApiController::class, 'regTransaccion'])->name('regTransaccion');
Route::get('/getLastTransaccion', [ApiController::class, 'getLastTransaccion'])->name('getLastTransaccion');
Route::get('/documentos', [DocumentoController::class, 'index'])->name('documento');

//***Api Asesores***//
Route::get('/asesores/api', [AsesorController::class, 'index']); 

//***Api Inmuebles***//
Route::get('/inmuebles/api', [InmuebleController::class, 'index']); 

//***Api Transacciones***/
Route::get('/transacciones/api', [InmuebleController::class, 'index']); 

