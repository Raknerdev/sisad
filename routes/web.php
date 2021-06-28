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
Route::get('/', 'App\Http\Controllers\admin\AdminController@index')->name('index');
Route::get('/login', 'App\Http\Controllers\admin\PermisoController@index');
// Rutas Vista Aside
Route::get('/personal', 'App\Http\Controllers\admin\AdminController@personal')->name('personal');
Route::get('/clientes', 'App\Http\Controllers\admin\AdminController@clientes')->name('clientes');
Route::get('/productos', 'App\Http\Controllers\admin\AdminController@productos')->name('productos');
Route::get('/reporte', 'App\Http\Controllers\facturacion\FacturacionController@reporte')->name('reporte');
// Facturacion
Route::get('/factura_compra', 'App\Http\Controllers\facturacion\FacturacionController@compra')->name('compras');
Route::get('/factura_venta', 'App\Http\Controllers\facturacion\FacturacionController@venta')->name('ventas');
Route::get('/nota_entrega', 'App\Http\Controllers\facturacion\FacturacionController@nota')->name('notas');
// View Item
Route::get('/view_compra/{id}', 'App\Http\Controllers\facturacion\FacturacionController@showCompra')->name('v_compra');
Route::get('/view_venta/{id}', 'App\Http\Controllers\facturacion\FacturacionController@showVenta')->name('v_venta');
Route::get('/view_nota/{id}', 'App\Http\Controllers\facturacion\FacturacionController@showNota')->name('v_nota');
// VIew Edit Item
Route::get('/edit_compra/{id}', 'App\Http\Controllers\facturacion\FacturacionController@editCompra')->name('e_compra');
Route::get('/edit_venta/{id}', 'App\Http\Controllers\facturacion\FacturacionController@editVenta')->name('e_venta');
Route::get('/edit_nota/{id}', 'App\Http\Controllers\facturacion\FacturacionController@editNota')->name('e_nota');
Route::get('/edit_producto/{id}', 'App\Http\Controllers\admin\AdminController@editProducto')->name('e_producto');
// Edit Item Post
Route::post('/update_nota/{id}', 'App\Http\Controllers\facturacion\FacturacionController@updateNota')->name('up_nota');
Route::post('/update_producto/{id}', 'App\Http\Controllers\admin\AdminController@updateProducto')->name('up_producto');
// Destroy
Route::get('/compra_destroy/{id}', 'App\Http\Controllers\facturacion\FacturacionController@destroyCompra')->name('d_compra');
Route::get('/venta_destroy/{id}', 'App\Http\Controllers\facturacion\FacturacionController@destroyVenta')->name('d_venta');
Route::get('/nota_destroy/{id}', 'App\Http\Controllers\facturacion\FacturacionController@destroyNota')->name('d_nota');

// Scripts Route
Route::get('/list_clientes', 'App\Http\Controllers\admin\AdminController@listClients')->name('list_clients');
Route::get('/list_prodcts', 'App\Http\Controllers\admin\AdminController@listProducts')->name('list_products');

// Rutas POST
Route::post('/agregar_producto', 'App\Http\Controllers\admin\AdminController@aggProducto')->name('agg_producto');
Route::post('/agregar_cliente', 'App\Http\Controllers\admin\AdminController@aggCliente')->name('agg_cliente');
Route::post('/agregar_usuario', 'App\Http\Controllers\admin\AdminController@aggUsuario')->name('agg_usuario');
Route::post('/agregar_compra', 'App\Http\Controllers\admin\AdminController@aggCompra')->name('agg_compra');
Route::post('/agregar_venta', 'App\Http\Controllers\admin\AdminController@aggVenta')->name('agg_venta');
Route::post('/agregar_nota', 'App\Http\Controllers\admin\AdminController@aggNota')->name('agg_nota');
