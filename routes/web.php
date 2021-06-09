<?php

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

Route::get('/', 'App\Http\Controllers\InicioController@index');
Route::get('login', 'App\Http\Controllers\admin\PermisoController@index')->name('login');
Route::get('personal', 'App\Http\Controllers\admin\UsersController@index')->name('personal');
// Facturacion
    // Facturacion Venta
Route::get('crear_factura_venta', 'App\Http\Controllers\facturacion\VentaController@create')->name('crear_fv');
    // Facturacion Compra
Route::get('crear_factura_compra', 'App\Http\Controllers\facturacion\CompraController@create')->name('crear_fc');

Route::get('factura_compra', 'App\Http\Controllers\facturacion\CompraController@prueba')->name('prueba_c');
Route::get('factura_venta', 'App\Http\Controllers\facturacion\VentaController@prueba')->name('prueba');
    // Nota de Entrega
Route::get('nota', 'App\Http\Controllers\facturacion\NotaController@prueba')->name('prueba');

Route::get('crear_nota_entrega', 'App\Http\Controllers\facturacion\NotaController@create')->name('cnota');

Route::get('notas', 'App\Http\Controllers\facturacion\NotaController@index')->name('nota');



