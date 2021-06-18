<?php

namespace App\Http\Controllers\facturacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Permiso;
use App\Models\admin\Productos;
use App\Models\facturacion\Reportes;
use App\Models\facturacion\FacVenta;
use App\Models\facturacion\FacCompra;
use App\Models\facturacion\NotaEntrega;
use App\Models\User;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function reporte()
    {
        $totalMonto = 0;
        $totalAbono = 0;
        $totalResta = 0;
        $totalDescontado = 0;
        $reportes = Reportes::orderBy('id')->get();
        foreach ($reportes as $reporte) {
            $total = $total + $reporte->id;
        }
        if ($reportes) {
            return view('reports.reporte', compact('reportes',
            'totalMonto','totalAbono','totalResta','totalDescontado'));
        }else{
            return view('reports.reporte', compact(
            'totalMonto','totalAbono','totalResta','totalDescontado'));
        }
    }
    public function venta()
    {   
        $facturas = FacVenta::orderBy('id')->get();
        return view('facturacion.venta', compact('facturas'));
    }
    public function showVenta($id)
    {
        $venta = FacVenta::find($id);
        return view('facturacion.fventa', compact('venta'));
    }
    public function destroyVenta($id)
    {
        $venta = FacVenta::find($id);
        $venta->delete();
        return back();
    }

    public function compra()
    {   
        $facturas = FacCompra::orderBy('id')->get();
        return view('facturacion.compra', compact('facturas'));
    }
    public function showCompra($id)
    {
        $compra = FacCompra::find($id);
        $id_prod = json_decode($compra->productos);
        $tipo = $compra->tipo_cliente;

        foreach ($id_prod as $prod) {
            $producto[] = Productos::find($prod);
        }
        return view('facturacion.fcompra', compact('compra', 'producto'));
    }
    public function destroyCompra($id)
    {
        $compra = FacCompra::find($id);
        $compra->delete();
        return back();
    }

    public function nota()
    {   
        $notas = NotaEntrega::orderBy('id')->get();
        return view('facturacion.nota', compact('notas'));
    }
    public function showNota($id)
    {
        $nota = NotaEntrega::find($id);
        return view('facturacion.fnota', compact('nota'));
    }
    public function destroyNota($id)
    {
        $nota = FacCompra::find($id);
        $nota->delete();
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
