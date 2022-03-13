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

    // entidades
    Route::get('/entidad/facturacionconceptos/{entidad}', [EntidadController::class, 'facturacionconceptos'])->name('entidad.facturacionconceptos');
    Route::get('/entidad/pu/{entidad}', [EntidadController::class, 'pus'])->name('entidad.pu');
    Route::get('/entidad/contacto/{entidad}', [EntidadController::class, 'contactos'])->name('entidad.contacto');
    Route::get('/entidad/nuevocontacto/{entidad}', [EntidadController::class, 'createcontacto'])->name('entidad.createcontacto');
    Route::resource('entidad', EntidadController::class)->only('edit','create');

    //Facturacion
    Route::get('facturacion/import', [FacturacionController::class,'import'])->name('facturacion.import');
    Route::get('facturacion/{factura}/imprimirfactura', [FacturacionController::class,'imprimirfactura'])->name('facturacion.imprimirfactura');
    Route::get('facturacion/{factura}/downfacturapdf', [FacturacionController::class,'downfacturapdf'])->name('facturacion.downfactura');
    Route::get('facturacion/downfacturas', [FacturacionController::class,'downfacturas'])->name('facturacion.downfacturas');
    Route::get('facturacion/zip', [FacturacionController::class,'downloadZip'])->name('facturacion.zip');
    Route::get('facturacion/prefacturas', [FacturacionController::class,'prefacturas'])->name('facturacion.prefacturas');
    Route::resource('facturacion', FacturacionController::class);

 });

//  Route::any('{query}',function(){
//      return redirect('/login');
//     })
//     ->where('query','.*');
