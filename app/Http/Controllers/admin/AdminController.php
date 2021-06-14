<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Productos;
use App\Models\admin\Clientes;
use App\Models\admin\Permiso;

class AdminController extends Controller
{

    public function clientes()
    {
        $clientes = Clientes::orderBy('id')->get();
        return view('admin.clientes', compact('clientes'));
    }

    public function aggCliente(Request $request)
    {
        // Para hacer que los productos se cuenten 
        $c= Clientes::orderBy('nro_cliente', 'desc')->first();
        if ($c){
        $id = $c->nro_cliente + 1;
        }else{
        $id = 1;
        }

        $cliente = new Clientes();
        $cliente->nro_cliente = $id;
        $cliente->codigo = 'CLT' . str_pad($id, 3, '0', STR_PAD_LEFT);
        $cliente-> nombre = $request->nombre;
        $cliente-> cedula = $request->cedula;
        $cliente-> direccion = $request->direccion;
        $cliente-> telefono = $request->telefono;
        $cliente-> tipo = $request->tipo;
        $cliente-> save();

        return back();
    }
    public function productos()
    {
        // return view('productos.index');
        $products = Productos::orderBy('id')->get();
        return view('admin.productos', compact('products'));
    }

    public function aggProducto(Request $request)
    {
        // Para hacer que los productos se cuenten 
        $c= Productos::orderBy('id_producto', 'desc')->first();
        if ($c){
        $id = $c->id_producto + 1;
        }else{
        $id = 1;
        }

        $prod = new Productos();
        $prod -> id_producto = $id;
        $prod -> codigo = 'ART-' . str_pad($id, 3, '0', STR_PAD_LEFT);
        $prod -> name = $request->nombre;
        $prod -> precio_vip = $request->precio_vip;
        $prod -> precio_m = $request->precio_mayor;
        $prod -> precio_d = $request->precio_detal;
        $prod -> save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function personal()
    {
        $users = Permiso::orderBy('id')->get();
        return view('admin.personal', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
