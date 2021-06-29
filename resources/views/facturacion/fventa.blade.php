@extends("theme.$theme.layout")
@section('titulo')
    Factura de Venta
@endsection
@section('contenido')
<div class="card text-center p-3">
    <div class="card-header row">
        <div class="col-6 text-left">
            <img src="{{asset("assets/img/header.jpeg")}}" style="width: 70%;" alt="Consorcio Express">
        </div>
        <div class="col-6 pl-5">
            <div class="row-cols-12 text-right">
                Factura Nro: <span class="text-monospace ml-2 text-danger"> {{$venta->nro_factura}}</span>
            </div>
            <div class="row-cols-12 text-right">
                Nro Control: <span class="text-monospace ml-2 text-danger"> {{$venta->nro_control}}</span>
            </div>
            <div class="row-cols-12 text-right">
                Fecha de Emision: <span class="text-monospace ml-2"> {{$venta->fecha_emision}}</span>
            </div>
        </div>
    </div>
    <div class="card-body pt-0 pb-0 mt-3">
        <div class="row">
            <div class="col-6 text-left">
                <p>Nombre o Razon Social: <span class="text-monospace ml-2"> {{$venta->nombre_c}}</span></p>
                <p>Domicilio Fiscal: <span class="text-monospace ml-2"> {{$venta->direccion_c}}</span></p>
            </div>
            <div class="col-6 text-left">
                <p>Cedula o Rif: <span class="text-monospace ml-2"> {{$venta->cedula_c}}</span></p>
                <p>Teléfono: <span class="text-monospace ml-2"> {{$venta->telefono}}</span></p>
            </div>
        </div>
        <div class="row mt-3 table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width: 10%;">Ítem</th>
                        <th style="width: 16%;">Código</th>
                        <th style="width: 33%;">Producto</th>
                        <th style="width: 12%;">Cantidad</th>
                        <th style="width: 15%;">Precio Unitario</th>
                        <th style="width: 14%;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{--  Lista de Productos  --}}
                    @php
                        $cont = 0;
                        $costo = 0;
                        $tipo = $venta->tipo_cliente;
                        $pesos = json_decode($venta->pesos);
                    @endphp
                    @for ($i = 0; $i < count($pesos); $i++)
                    <tr>
                        <td>
                            {{$cont=$cont+1}}
                        </td>
                        <td>{{$producto[$i]->codigo}}</td>
                        <td class="text-left">{{$producto[$i]->name}}</td>
                        <td>{{$pesos[$i]}} kg</td>
                        <td>{{$producto[$i]->$tipo}}$</td>
                        <td>{{round($cost = $pesos[$i] * $producto[$i]->$tipo)}}$</td>
                    </tr>
                    @php
                        $costo = $costo + $cost;
                    @endphp
                    @endfor
                    {{--  Fin Lista de Productos  --}}
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" rowspan="2" class="align-bottom"> <small>Disculpe por la demora, trabajamos para su satisfacción.</small></td>
                        <th class="text-right">Sub Total:</th>
                        <td>{{round($costo)}}$</td>
                    </tr>
                    <tr>
                        <th class="text-right">Total:</th>
                        <td>{{round($costo)}}$</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{--  <div class="card-footer text-muted">
        Nota: no se aceptan devoluciones ni camios.
    </div>  --}}
</div>
{{--  <table class="bg-white table table-bordered text-black">
    <tr>
        <th colspan="4" style="width: 5%;">
            <img src="{{asset("assets/img/header.jpeg")}}" style="width: 60%;" alt="Consorcio Express">
        </th>
        <th colspan="2">
            <p>
                Factura Nro: <span class="text-monospace ml-1"> {{$venta->nro_factura}}</span>
            </p>
            <p>
                Nro Control: <span class="text-monospace ml-1"> {{$venta->nro_control}}</span>
            </p>
            <p class="mb-1">
                Fecha de Emision: <span class="text-monospace ml-1"> {{$venta->fecha_emision}}</span>
            </p>
        </th>
    </tr>    
    <tr>
        <th colspan="6" class="pl-4">
            <p>
                Nombre o Razon Social: <span class="text-monospace ml-2"> {{$venta->nombre_c}}</span>
            </p>
            <p>
                Cedula o Rif: <span class="text-monospace ml-2"> {{$venta->cedula_c}}</span>
            </p>
            <p>
                Teléfono: <span class="text-monospace ml-2"> {{$venta->telefono}}</span>
            </p>
            <p>
                Domicilio Fiscal: <span class="text-monospace ml-2"> {{$venta->direccion_c}}</span>
            </p>
        </th>
    </tr>    
    <tr style="height: 0.5cm;"></tr>
    <tr class="text-center">
        <th style="width: 10%;">Item</th>
        <th style="width: 16%;">Codigo</th>
        <th style="width: 35%;">Producto</th>
        <th style="width: 12%;">Cantidad</th>
        <th style="width: 12%;"> Precio Unitario</th>
        <th style="width: 15%;">Total</th>
    </tr>
    @php
        $cont = 0;
        $costo = 0;
        $tipo = $venta->tipo_cliente;
        $pesos = json_decode($venta->pesos);
        $products = $producto;
    @endphp
    @for ($i = 0; $i < count($pesos); $i++)
    <tr class="text-center">
        <th>
            {{$cont=$cont+1}}
        </th>
        <th>{{$products[$i]->codigo}}</th>
        <th>{{$products[$i]->name}}</th>
        <th>{{$pesos[$i]}} kg</th>
        <th>{{$products[$i]->$tipo}}$</th>
        <th>{{$cost = $pesos[$i] * $products[$i]->$tipo}}$</th>
    </tr>
    @php
        $costo = $costo + $cost;
    @endphp
    @endfor
    <tr style="height: 0.5cm;"></tr>
    <tr>
        <th colspan="5" rowspan="3" class="text-center align-bottom">Recibo Conforme</th>
        <th class="text-center">Sub Total: {{$venta->sub_total}}$</th>
    </tr>
    <tr>
        <th class="text-center">IVA {{$venta->iva}}%: {{$venta->valor_iva}}$</th>
    </tr>
    <tr>
        <th class="text-center">Total a pagar: {{$venta->total}}$</th>
    </tr>
    <tr class="text-left">
        <th colspan="6">Forma de Pago: {{$venta->forma_pago}}</th>
    </tr>
    <tr>
        <th colspan="6">Nota: no se aceptan devoluciones ni camios.</th>
    </tr>
</table>  --}}
@endsection
