<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Productos;
use App\Models\admin\Clientes;
use App\Models\admin\Permiso;
use App\Models\facturacion\FacVenta;
use App\Models\facturacion\FacCompra;
use App\Models\facturacion\NotaEntega;
use App\Models\User;

class AdminController extends Controller
{
    public function listClients(){
        $clientes = Clientes::get();
        return $clientes;
    }

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
    public function listProducts(){
        $products = Productos::get();
        return $products;
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
        $prod -> VIP = $request->precio_vip;
        $prod -> Mayorista = $request->precio_mayor;
        $prod -> Minorista= $request->precio_detal;
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
    public function aggUsuario(Request $request)
    {

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->nombre;
        $user->last_name = $request->apellido;
        $user->email = $request->correo;
        $user->password = $request->password;
        $user-> save();

        return back();
    }
    public function aggCompra(Request $request)
    {
        $prod = Productos::find($request->producto);
        $cliente = Clientes::find($request->cliente);
        // Para hacer que los productos se cuenten 
        $cf= FacCompra::orderBy('id_factura', 'desc')->first();
        if ($cf){
        $nf = $cf->id_factura + 1;
        }else{
        $nf = 1;
        }
        $cc= FacCompra::orderBy('id_factura', 'desc')->first();
        if ($cc){
        $nc = $cc->id_factura + 1;
        }else{
        $nc = 1;
        }

        $compra = new FacCompra();
        // Datos para Factura
        $compra-> id_factura = $nf;
        $compra-> tipo_cliente = $cliente->tipo;
        $compra-> nro_ctrl_patio = 'CPI-' . str_pad($nc, 8, '0', STR_PAD_LEFT);
        $compra-> nro_ctrl_factura = 'FAC-' . str_pad($nf, 8, '0', STR_PAD_LEFT);
        // $compra-> fecha_emision = $request->
        $compra-> cod_cliente = $cliente->codigo;
        $compra-> nombre_c = $cliente->nombre;
        $compra-> cedula_c = $cliente->cedula;
        $compra-> telefono = $cliente->telefono;
        $compra-> direccion_c = $cliente->direccion;
        
        $compra-> productos = json_encode($request->producto);

        $compra-> total_peso_prod = 0;
        $compra-> sub_total = 0;
        $compra-> total = 0;
        
        // Datos para Reporte
        $compra-> abono = 0;
        $compra-> resta = 0;
        $compra-> descuento = 0;
        $compra-> estado = 'Pendiente';
        $compra-> save();

        return back();
    }
    public function aggVenta(Request $request)
    {
        $prod = Productos::find($request->producto);
        $cliente = Clientes::find($request->cliente);
        // Para hacer que los productos se cuenten 
        $cf= FacVenta::orderBy('id_factura', 'desc')->first();
        if ($cf){
        $nf = $cf->id_factura + 1;
        }else{
        $nf = 1;
        }
        $cc= FacVenta::orderBy('id_factura', 'desc')->first();
        if ($cc){
        $nc = $cc->id_factura + 1;
        }else{
        $nc = 10;
        }

        $venta = new FacVenta();
        // Datos para Factura
        $venta-> id_factura = $nf;
        $venta-> nro_factura = 'FAC-' . str_pad($nf, 8, '0', STR_PAD_LEFT);
        $venta-> nro_control = 'CPI-' . str_pad($nc, 8, '0', STR_PAD_LEFT);
        $venta-> nombre_c = $cliente->nombre;
        $venta-> cedula_c = $cliente->cedula;
        $venta-> telefono = $cliente->telefono;
        $venta-> direccion_c = $cliente->direccion;

        // $venta-> productos =;
        $venta-> sub_total = 0;
        $venta-> total = 0;

        $venta-> tipo_cliente = $cliente->tipo;
        $venta-> forma_pago = $request->forma_pago;
        // Datos para Reporte
        $venta-> abono = 0;
        // $venta-> resta = $request->
        $venta-> descuento = 0;
        $venta-> estado = 'Pendiente';

        $venta-> save();

        return back();
    }
    public function aggNota(Request $request)
    {
        // Para hacer que los productos se cuenten 
        // $c= Clientes::orderBy('nro_cliente', 'desc')->first();
        // if ($c){
        // $id = $c->nro_cliente + 1;
        // }else{
        // $id = 1;
        // }

        // $cliente = new Clientes();
        // $cliente->nro_cliente = $id;
        // $cliente->codigo = 'CLT' . str_pad($id, 3, '0', STR_PAD_LEFT);
        // $cliente-> nombre = $request->nombre;
        // $cliente-> cedula = $request->cedula;
        // $cliente-> direccion = $request->direccion;
        // $cliente-> telefono = $request->telefono;
        // $cliente-> tipo = $request->tipo;
        // $cliente-> save();

        return back();
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
