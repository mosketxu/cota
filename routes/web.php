<?php

use App\Http\Controllers\EntidadController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {return view('entidades');})->name('entidades');

    Route::get('/entidad/pu/{entidad}', [EntidadController::class, 'pus'])->name('entidad.pu');
    Route::get('/entidad/contacto/{entidad}', [EntidadController::class, 'contactos'])->name('entidad.contacto');
    Route::resource('entidad', EntidadController::class);


    // Route::get('/entidades', function () {return view('entidades');})->name('entidades');
 });
