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
// Rutas Principales
Route::get('/', 'App\Http\Controllers\InicioController@index');
Route::get('/login', 'App\Http\Controllers\admin\PermisoController@index');
// Rutas Vista Aside
Route::get('/personal', 'App\Http\Controllers\admin\AdminController@personal');
Route::get('/clientes', 'App\Http\Controllers\admin\AdminController@clientes');
Route::get('/productos','App\Http\Controllers\admin\AdminController@productos');
Route::get('/reporte', 'App\Http\Controllers\facturacion\FacturacionController@reporte');
    // Facturacion
Route::get('/factura_compra', 'App\Http\Controllers\facturacion\FacturacionController@compra');
Route::get('/factura_venta', 'App\Http\Controllers\facturacion\FacturacionController@venta');
        // View item
Route::get('/view_compra/{id}', 'App\Http\Controllers\facturacion\FacturacionController@showCompra');
Route::get('/view_venta/{id}', 'App\Http\Controllers\facturacion\FacturacionController@showVenta');
Route::get('/view_nota/{id}', 'App\Http\Controllers\facturacion\FacturacionController@showNota');
        // Destroy
Route::get('/compra_destroy/{id}', 'App\Http\Controllers\facturacion\FacturacionController@destroyCompra');
Route::get('/venta_destroy/{id}', 'App\Http\Controllers\facturacion\FacturacionController@destroyVenta');
Route::get('/nota_destroy/{id}', 'App\Http\Controllers\facturacion\FacturacionController@destroyNota');

// Scripts Route
Route::get('/list_clientes', 'App\Http\Controllers\admin\AdminController@listClients');

// Rutas POST
Route::post('/agregar_producto','App\Http\Controllers\admin\AdminController@aggProducto');
Route::post('/agregar_cliente','App\Http\Controllers\admin\AdminController@aggCliente');
Route::post('/agregar_usuario','App\Http\Controllers\admin\AdminController@aggUsuario');
Route::post('/agregar_compra','App\Http\Controllers\admin\AdminController@aggCompra');
Route::post('/agregar_venta','App\Http\Controllers\admin\AdminController@aggVenta');
Route::post('/agregar_nota','App\Http\Controllers\admin\AdminController@aggNota');

    // Nota de Entrega
Route::get('/nota', 'App\Http\Controllers\facturacion\NotaController@prueba');
Route::get('/crear_nota_entrega', 'App\Http\Controllers\facturacion\NotaController@create');
Route::get('/notas', 'App\Http\Controllers\facturacion\NotaController@index');



