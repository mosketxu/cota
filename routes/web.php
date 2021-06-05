<?php

use App\Http\Controllers\{EntidadController,FacturacionController};
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
    Route::get('/entidad/nuevocontacto/{entidad}', [EntidadController::class, 'createcontacto'])->name('entidad.createcontacto');
    Route::resource('entidad', EntidadController::class);
    Route::get('facturacion/{factura}/pdf', [FacturacionController::class,'pdf'])->name('factura.pdf');
    Route::resource('facturacion', FacturacionController::class);

 });

//  Route::any('{query}',function(){
//      return redirect('/login');
//     })
//     ->where('query','.*');
