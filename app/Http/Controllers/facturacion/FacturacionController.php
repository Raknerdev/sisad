<?php

namespace App\Http\Controllers\facturacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Productos;
use App\Models\admin\Clientes;
use App\Models\facturacion\FacVenta;
use App\Models\facturacion\FacCompra;
use App\Models\facturacion\NotaEntega;
use App\Models\facturacion\Seguimiento;

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
        $producto = json_decode($venta->productos);
        return view('facturacion.fventa', compact('venta', 'producto'));
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
        $producto = json_decode($nota->productos);
        return view('facturacion.fnota', compact('nota', 'producto'));
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

    public function updateNota(Request $request, $id)
    {
        $id_nota = decrypt($id);
        $nota = NotaEntega::find($id_nota);
        $cliente = Clientes::find($nota->id_cliente);
        $nota->fecha_pago = $request->fecha;
        if ($request->estado) {
            $nota->estado = $request->estado;
        }
        if ($request->f_pago) {
            $nota->forma_pago = $request->f_pago;
        }
        if ($request->referencia) {
            $nota->ref = $request->referencia;
        }
        if ($request->obs) {
            $nota->observacion = $request->obs;
        } else {
            $nota->observacion = 'N/P';
        }

        if ($request->peso[0] != null) {
            $cliente = Clientes::find($nota->id_cliente);
            $prod = $request->producto;
            $pesos = $request->peso;
            $tipo = $cliente->tipo;
            foreach ($prod as $prodts) {
                $productos[] = Productos::find($prodts);
            }
            $costo = 0;
            for ($i = 0; $i < count($pesos); $i++) {
                $pund = $productos[$i]->$tipo;
                $cost = $pesos[$i] * $pund;
                $costo = $costo + $cost;
            }
            $nota->total = $nota->total + $costo;
            $nota->productos = json_encode($productos);

            if ($request->abono) {
                $nota->debe = $nota->debe - $request->abono;
                if ($nota->resta) {
                    $nota->debe = $nota->resta;
                } else {
                    $nota->debe = $nota->total;
                }
                $nota->abono = $request->abono;
                $nota->resta = $nota->debe - $nota->descuento;
            } else {
                $nota->abono = 0;
                $nota->debe = ($costo) - $nota->abono;
                $nota->resta = $nota->debe - $nota->descuento;
            }
        } else {
            if ($request->abono) {
                if ($nota->resta) {
                    $nota->debe = $nota->resta;
                } else {
                    $nota->debe = $nota->total;
                }
                $nota->abono = $request->abono;
                $nota->resta = $nota->debe - $request->abono;
            } else {
                $nota->abono = 0;
                $nota->debe = $nota->debe - $nota->abono;
                $nota->resta = $nota->debe - $request->descuento;
            }
        }
        if ($nota->nota != null) {
            $nota->descuento = $nota->descuento - $costo;
        }

        $nota->save();
        // Seguimiento
        $nota_a = NotaEntega::find($id_nota);
        $seguimiento = new Seguimiento();
        $seguimiento->id_cliente = $nota_a->id_cliente;
        $seguimiento->id_factura = $id_nota;
        $seguimiento->total = $nota_a->total;
        $seguimiento->fecha_pago = $request->fecha;
        $seguimiento->debe = $nota_a->debe;
        $seguimiento->forma_pago = $nota_a->forma_pago;
        $seguimiento->ref = $nota_a->ref;
        $seguimiento->abono = $nota_a->abono;
        $seguimiento->resta = $nota_a->resta;
        $seguimiento->descuento = $nota_a->descuento;
        $seguimiento->save();

        return back();
    }
}
