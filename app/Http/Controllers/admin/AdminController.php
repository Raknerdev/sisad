<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Productos;
use App\Models\admin\Clientes;
use App\Models\admin\Permiso;
use App\Models\facturacion\Control;
use App\Models\facturacion\FacVenta;
use App\Models\facturacion\FacCompra;
use App\Models\facturacion\NotaEntega;
use App\Models\facturacion\Seguimiento;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('inicio');
    }

    public function listClients()
    {
        $clientes = Clientes::get();
        return $clientes;
    }

    public function clientes()
    {
        $seguimientos = Seguimiento::orderBy('id')->get();
        $clientes = Clientes::orderBy('id')->get();
        return view('admin.clientes', compact('clientes', 'seguimientos'));
    }

    public function aggCliente(Request $request)
    {
        // Para hacer que los productos se cuenten 
        $c = Clientes::orderBy('nro_cliente', 'desc')->first();
        if ($c) {
            $id = $c->nro_cliente + 1;
        } else {
            $id = 1;
        }

        $cliente = new Clientes();
        $cliente->nro_cliente = $id;
        $cliente->codigo = 'CLT' . str_pad($id, 3, '0', STR_PAD_LEFT);
        $cliente->nombre = $request->nombre;
        $cliente->cedula = $request->cedula;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->tipo = $request->tipo;
        $cliente->facturas = 0;
        $cliente->save();

        return back();
    }

    public function listProducts()
    {
        $products = Productos::get();
        return $products;
    }

    public function productos()
    {
        // return view('productos.index');
        $products = Productos::orderBy('id')->get();
        return view('admin.productos', compact('products'));
    }
    public function editProducto($id)
    {
        $id_prod = decrypt($id);
        $producto = Productos::find($id_prod);
        return view('admin.editProducto', compact('producto'));
    }

    public function aggProducto(Request $request)
    {
        // Para hacer que los productos se cuenten 
        $c = Productos::orderBy('id_producto', 'desc')->first();
        if ($c) {
            $id = $c->id_producto + 1;
        } else {
            $id = 1;
        }

        $prod = new Productos();
        $prod->id_producto = $id;
        $prod->codigo = 'ART-' . str_pad($id, 3, '0', STR_PAD_LEFT);
        $prod->name = $request->nombre;
        $prod->VIP = $request->precio_vip;
        $prod->Mayorista = $request->precio_mayor;
        $prod->Minorista = $request->precio_detal;
        $prod->save();

        return back();
    }
    public function updateProducto(Request $request, $id)
    {
        $id_prod = decrypt($id);
        $producto = Productos::find($id_prod);
        if ($request->mayorista) {
            $producto->Mayorista = $request->mayorista;
        }
        if ($request->minorista) {
            $producto->Minorista = $request->minorista;
        }
        if ($request->vip) {
            $producto->VIP = $request->vip;
        }
        if ($request->name) {
            $producto->name = $request->name;
        }
        $producto->save();

        $products = Productos::orderBy('id')->get();
        return view('admin.productos', compact('products'));
    }

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
        $user->save();

        return back();
    }

    public function aggCompra(Request $request)
    {
        $prod = Productos::find($request->producto);
        $cliente = Clientes::find($request->cliente);
        // Para hacer que los productos se cuenten 
        $cf = FacCompra::orderBy('id_factura', 'desc')->first();
        if ($cf) {
            $nf = $cf->id_factura + 1;
        } else {
            $nf = 1;
        }
        $cc = FacCompra::orderBy('id_factura', 'desc')->first();
        if ($cc) {
            $nc = $cc->id_factura + 1;
        } else {
            $nc = 1;
        }

        $compra = new FacCompra();
        // Datos para Factura
        $compra->id_factura = $nf;
        $compra->tipo_cliente = $cliente->tipo;
        $compra->nro_ctrl_patio = 'CPI-' . str_pad($nc, 8, '0', STR_PAD_LEFT);
        $compra->nro_ctrl_factura = 'FAC-' . str_pad($nf, 8, '0', STR_PAD_LEFT);
        // $compra-> fecha_emision = $request->
        $compra->cod_cliente = $cliente->codigo;
        $compra->nombre_c = $cliente->nombre;
        $compra->cedula_c = $cliente->cedula;
        $compra->telefono = $cliente->telefono;
        $compra->direccion_c = $cliente->direccion;

        $compra->productos = json_encode($request->producto);

        $compra->total_peso_prod = 0;
        $compra->sub_total = 0;
        $compra->total = 0;

        // Datos para Reporte
        $compra->abono = 0;
        $compra->resta = 0;
        $compra->descuento = 0;
        $compra->estado = 'Pendiente';
        $compra->save();

        return back();
    }

    public function aggVenta(Request $request)
    {
        $cliente = Clientes::find($request->cliente);
        $cf = Control::orderBy('nro_factura', 'desc')->first();
        $control = Control::orderBy('nro_factura_nota', 'desc')->first();
        $cpi = Control::orderBy('nro_patio_i', 'desc')->first();
        $cpii = Control::orderBy('nro_patio_ii', 'desc')->first();
        if ($cf) {
            $factura = $cf->nro_factura + 1;
        } else {
            $factura = 0;
        }
        if ($control) {
            $nro_ctrlf = $control->nro_factura_nota + 1;
        } else {
            $nro_ctrlf = 1;
        }

        $venta = new FacVenta();

        if ($request->patio == 1) {
            if ($cpi) {
                $nro_ctrlpi = $cpi->nro_patio_i + 1;
            } else {
                $nro_ctrlpi = 1;
            }
            $venta->nro_control = 'CPTI-' . str_pad($nro_ctrlpi, 8, '0', STR_PAD_LEFT);
        } elseif ($request->patio == 2) {
            if ($cpii) {
                $nro_ctrlpii = $cpii->nro_patio_ii + 1;
            } else {
                $nro_ctrlpii = 0;
            }
            $venta->nro_control = 'CPTII-' . str_pad($nro_ctrlpii, 8, '0', STR_PAD_LEFT);
        }
        // Datos para Factura
        $venta->nro_factura = 'FAC-' . str_pad($nro_ctrlf, 8, '0', STR_PAD_LEFT);
        $venta->fecha_emision = $request->fecha;

        $venta->nombre_c = $cliente->nombre;
        $venta->cedula_c = $cliente->cedula;
        $venta->telefono = $cliente->telefono;
        $venta->direccion_c = $cliente->direccion;
        $venta->tipo_cliente = $cliente->tipo;
        $venta->forma_pago = $request->forma_pago;

        if ($request->peso[0] != null) {
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
            $venta->sub_total = $costo;
            $venta->productos = json_encode($productos);
            $venta->pesos = json_encode($request->peso);
            $venta->iva = $request->iva;
            $venta->valor_iva = $costo * ($request->iva / 100);
            $venta->total = $costo + $venta->valor_iva;
        }

        $venta->save();

        $control_c = Control::find(1);
        if ($control_c) {
            if ($request->patio == 1) {
                $control_c->nro_patio_i = $nro_ctrlpi;
                $control_c->nro_patio_ii = $cpi->nro_patio_ii;
            } else {
                $control_c->nro_patio_ii = $nro_ctrlpii;
                $control_c->nro_patio_i = $cpi->nro_patio_i;
            }
            $control_c->nro_factura_nota = $nro_ctrlf;
            $control_c->save();
        } else {
            $c = new Control();
            $c->nro_factura = $factura;
            if ($request->patio == 1) {
                $c->nro_patio_i = $nro_ctrlpi;
                if ($cpi) {
                    $c->nro_patio_ii = $cpi->nro_patio_ii;
                } else {
                    $c->nro_patio_ii = 0;
                }
            } else {
                $c->nro_patio_ii = $nro_ctrlpii;
                if ($cpi) {
                    $c->nro_patio_i = $cpi->nro_patio_i;
                } else {
                    $c->nro_patio_i = 0;
                }
            }
            $c->nro_factura_nota = $nro_ctrlf;
            $c->save();
        }
        return back();
    }

    public function aggNota(Request $request)
    {
        $cliente = Clientes::find($request->cliente);
        $cf = Control::orderBy('nro_factura', 'desc')->first();
        $control = Control::orderBy('nro_factura_nota', 'desc')->first();
        $cpi = Control::orderBy('nro_patio_i', 'desc')->first();
        $cpii = Control::orderBy('nro_patio_ii', 'desc')->first();
        if ($cf) {
            $factura = $cf->nro_factura + 1;
        } else {
            $factura = 0;
        }
        if ($control) {
            $nro_ctrlf = $control->nro_factura_nota + 1;
        } else {
            $nro_ctrlf = 1;
        }

        $nota = new NotaEntega();
        $nota->ctrl_factura = 'FCE-' . str_pad($nro_ctrlf, 5, '0', STR_PAD_LEFT);
        $nota->fecha_emision = $request->fecha;
        $nota->id_cliente = $cliente->id;
        $nota->cod_cliente = $cliente->codigo;
        $nota->nombre_c = $cliente->nombre;
        $nota->cedula_c = $cliente->cedula;
        $nota->telefono = $cliente->telefono;
        $nota->direccion_c = $cliente->direccion;
        $nota->cliente = $cliente->tipo;
        $nota->fecha_pago = $request->fecha;
        $nota->ref = 'N/P';
        $nota->estado = 'Pendiente';

        if ($request->patio == 1) {
            if ($cpi) {
                $nro_ctrlpi = $cpi->nro_patio_i + 1;
            } else {
                $nro_ctrlpi = 1;
            }
            $nota->ctrl_patio = 'CPTI-' . str_pad($nro_ctrlpi, 5, '0', STR_PAD_LEFT);
        } elseif ($request->patio == 2) {
            if ($cpii) {
                $nro_ctrlpii = $cpii->nro_patio_ii + 1;
            } else {
                $nro_ctrlpii = 0;
            }
            $nota->ctrl_patio = 'CPTII-' . str_pad($nro_ctrlpii, 5, '0', STR_PAD_LEFT);
        }
        if ($request->forma_pago) {
            $nota->forma_pago = $request->forma_pago;
        }
        if ($request->obs) {
            $nota->observacion = $request->obs;
        } else {
            $nota->observacion = 'N/P';
        }

        if ($request->peso[0] != null) {
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
            $nota->total = $costo;
            $nota->productos = json_encode($productos);
            $nota->pesos = json_encode($request->peso);

            if ($request->avance) {
                $nota->descuento = $request->avance;
            } else {
                $nota->descuento = 0;
            }
            $nota->debe = $costo;
            $nota->abono = 0;
            $nota->resta = $nota->debe - $nota->descuento;
        } else {
            $costo = 0;
            $nota->total = 0;
            if ($request->avance) {
                $nota->descuento = $request->avance;
            } else {
                $nota->descuento = 0;
            }
            $nota->debe = $nota->total;
            $nota->abono = 0;
            $nota->resta = $nota->debe - $nota->descuento;
        }
        $nota->save();

        $client = Clientes::find($cliente->id);
        if ($client->facturas == 0) {
            $client->facturas = 1;
        } else {
            $client->facturas = $client->facturas + 1;
        }
        $client->save();

        $control_c = Control::find(1);
        if ($control_c) {
            if ($request->patio == 1) {
                $control_c->nro_patio_i = $nro_ctrlpi;
                $control_c->nro_patio_ii = $cpi->nro_patio_ii;
            } else {
                $control_c->nro_patio_ii = $nro_ctrlpii;
                $control_c->nro_patio_i = $cpi->nro_patio_i;
            }
            $control_c->nro_factura_nota = $nro_ctrlf;
            $control_c->save();
        } else {
            $c = new Control();
            $c->nro_factura = $factura;
            if ($request->patio == 1) {
                $c->nro_patio_i = $nro_ctrlpi;
                if ($cpi) {
                    $c->nro_patio_ii = $cpi->nro_patio_ii;
                } else {
                    $c->nro_patio_ii = 0;
                }
            } else {
                $c->nro_patio_ii = $nro_ctrlpii;
                if ($cpi) {
                    $c->nro_patio_i = $cpi->nro_patio_i;
                } else {
                    $c->nro_patio_i = 0;
                }
            }
            $c->nro_factura_nota = $nro_ctrlf;
            $c->save();
        }

        $id_nota = NotaEntega::orderBy('id', 'desc')->first();
        $seguimiento = new Seguimiento();
        $seguimiento->id_cliente = $cliente->id;
        $seguimiento->id_factura = $id_nota->id;
        $seguimiento->total = $id_nota->total;
        $seguimiento->fecha_pago = $id_nota->fecha_emision;
        $seguimiento->forma_pago = $id_nota->forma_pago;
        $seguimiento->ref = $id_nota->ref;
        $seguimiento->abono = $id_nota->abono;
        $seguimiento->debe = $id_nota->debe;
        $seguimiento->resta = $id_nota->resta;
        $seguimiento->descuento = $id_nota->descuento;

        $seguimiento->save();

        return back();
    }
}
