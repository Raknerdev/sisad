<?php

namespace App\Http\Controllers\facturacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Permiso;
use App\Models\admin\Productos;
use App\Models\facturacion\Control;
use App\Models\facturacion\Reportes;
use App\Models\facturacion\FacVenta;
use App\Models\facturacion\FacCompra;
use App\Models\facturacion\NotaEntega;
use App\Models\facturacion\Seguimiento;
use App\Models\User;

class FacturacionController extends Controller
{
    public function reporte()
    {
        $totalMonto = 0;
        $totalAbono = 0;
        $totalResta = 0;
        $totalDescontado = 0;
        $reportes = NotaEntega::orderBy('id')->get();
        return view('reports.reporte', compact('reportes'));
    }
    public function venta()
    {   
        $facturas = FacVenta::orderBy('id')->get();
        return view('facturacion.venta', compact('facturas'));
    }
    public function showVenta($id)
    {
        $id_venta = decrypt($id);
        $venta = FacVenta::find($id_venta);
        return view('facturacion.fventa', compact('venta'));
    }
    public function destroyVenta($id)
    {
        $id_venta = decrypt($id);
        $venta = FacVenta::find($id_venta);
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
        $id_compra = decrypt($id);
        $compra = FacCompra::find($id_compra);
        $id_prod = json_decode($compra->productos);
        $tipo = $compra->tipo_cliente;

        foreach ($id_prod as $prod) {
            $producto[] = Productos::find($prod);
        }
        return view('facturacion.fcompra', compact('compra', 'producto'));
    }
    public function destroyCompra($id)
    {
        $id_compra = decrypt($id);
        $compra = FacCompra::find($id_compra);
        $compra->delete();
        return back();
    }

    public function nota()
    {   
        $notas = NotaEntega::orderBy('id')->get();
        return view('facturacion.nota', compact('notas'));
    }
    public function showNota($id)
    {
        $id_nota = decrypt($id);
        $nota = NotaEntega::find($id_nota);
        return view('facturacion.fnota', compact('nota'));
    }
    public function destroyNota($id)
    {
        $id_nota = decrypt($id);
        $nota = NotaEntega::find($id_nota);
        $nota->delete();
        return back();
    }
    public function editNota($id)
    {   
        $id_nota = decrypt($id);
        $nota = NotaEntega::find($id_nota);
        $seguimientos = Seguimiento::orderBy('id')->get();
        return view('facturacion.editNota', compact('nota', 'seguimientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNota(Request $request, $id)
    {
        $nota = NotaEntega::find($id);
        $nota-> fecha_pago = $request->fecha;
        if ($request->f_pago) {
            $nota-> forma_pago = $request->f_pago;
        }
        if ($request->referencia) {
            $nota-> ref = $request->referencia;
        }
        if ($request->estado) {
            $nota-> estado = $request->estado;
        }
        if ($request->abono) {
            $nota-> debe = $nota->resta;
            $nota-> abono = $request->abono;
            $nota-> resta = $nota->debe - $request->abono;
        }
        if ($request->obs) {
            $nota-> observacion = $request->obs;
        }else{
            $nota-> observacion = 'N/P';
        }
        // $nota->total = $nota->total;
        $nota->save();

        $nota_a = NotaEntega::find($id);
        $seguimiento = new Seguimiento();

        $seguimiento-> id_cliente = $nota_a->id_cliente;
        $seguimiento-> id_factura = $id;
        $seguimiento-> total = $nota_a->total;
        $seguimiento-> fecha_pago = $request->fecha;
        $seguimiento-> debe = $nota_a->debe;


        if ($request->f_pago) {
            $seguimiento-> forma_pago = $request->f_pago;
        }else{
            $seguimiento-> forma_pago = $nota_a->forma_pago;
        }

        if ($request->referencia) {
            $seguimiento-> ref = $request->referencia;
        }

        if ($request->abono) {
            $seguimiento-> abono = $nota_a->abono;
            $seguimiento-> resta = $nota_a->debe - $nota_a->abono;
        }
        // $seguimiento-> descuento = $request->
        $seguimiento->save();

        
        return back();
    }

}
