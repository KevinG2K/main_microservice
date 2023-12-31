<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsesorController; // Asegúrate de importar el controlador
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/asesores/api', [AsesorController::class, 'index']); // Utiliza la sintaxis de arreglo para referenciar el controlador
Route::post('/asesores/api/upload', 'App\Http\Controllers\PDFController@uploadPDF');

