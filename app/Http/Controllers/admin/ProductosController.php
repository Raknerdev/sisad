<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('productos.index');
        $products = Productos::orderBy('id')->get();
        return view('productos.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Para hacer que los productos se cuenten 
        // $c= Productos::orderBy('id_producto', 'desc')->first();
        // if ($c){
        // $id = $c->id_recibido + 1;
        // }else{
        // $id = 1;
        // }

        $prod = new Productos();
        $prod -> codigo = $request->codigo;
        $prod -> name = $request->nombre;
        $prod -> precio_vip = $request->precio_vip;
        $prod -> precio_m = $request->precio_mayor;
        $prod -> precio_d = $request->precio_detal;
        $prod -> save();


        // $products = Productos::orderBy('id')->get();
        // return view('productos.index', compact('products'));
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
