@extends("theme.$theme.layout")
@section('titulo')
    Nota de entrega
@endsection
@section('contenido')
{{--  <small>
    <table class="bg-white table table-bordered text-black">
        <tr>
            <th colspan="7">
                <img src="{{asset("assets/img/header.jpeg")}}" style="width: 40%;" alt="Consorcio Express">
            </th>
        </tr>
        <tr class="text-center" style="background: #28a745; color: black">
            <th colspan="7"style="height: 1cm">
                Control de Pago de Factura
            </th>
        </tr>
        <tr>
            <th rowspan="6" style="width: 15%;"></th>
            <th colspan="1">Fecha: </th>
            <th colspan="1">{{$nota->fecha_emision}}</th>
            <th colspan="1">Nro. Control de Patio</th>
            <th colspan="1">{{$nota->ctrl_patio}}</th>
            <th colspan="1">Nro. Control de Factura</th>
            <th colspan="1">{{$nota->ctrl_factura}}</th>
        </tr>
        <tr>
            <th colspan="2">Codigo del Cliente:</th>
            <th colspan="5">{{$nota->cod_cliente}}</th>
        </tr>
        <tr class="border">
            <th colspan="2">Nombre o Razon Social:</th>
            <th colspan="5">{{$nota->nombre_c}}</th>
        </tr>
        <tr class="border">
            <th colspan="2">Cédula o Rif:</th>
            <th colspan="5">{{$nota->cedula_c}}</th>
        </tr>
        <tr class="border">
            <th colspan="2">Teléfono:</th>
            <th colspan="5">{{$nota->telefono}}</th>
        </tr>
        <tr class="border">
            <th colspan="2">Domicilio Fiscal:</th>
            <th colspan="5">{{$nota->direccion_c}}</th>
        </tr>
        <tr class="text-center" style="background: #28a745; color: black">
            <th colspan="7">
                Condiciones de Pago
            </th>
        </tr>
        <tr class="text-center">
            <th>Total a Pagar</th>
            <th>Fecha</th>
            <th>Forma de Pago</th>
            <th>Ref.</th>
            <th>Abona</th>
            <th>Debe</th>
            <th>Resta</th>
        </tr>
        <tr class="text-center">
            <th>{{$nota->total}}$</th>
            <th>{{$nota->fecha_pago}}</th>
            <th>{{$nota->forma_pago}}</th>
            <th>{{$nota->ref}}</th>
            <th>{{$nota->abono}}$</th>
            <th>{{$nota->debe}}$</th>
            <th>{{$nota->resta}}$</th>
        </tr>
        <tr>
            <th colspan="4" class="text-center align-bottom">Recibo Conforme</th>
            <th colspan="3" class="text-center">Disculpe por la demora, trabajamos para su satisfacción.</th>
        </tr>
    </table>
</small>  --}}
<div class="card text-center p-3">
    <div class="card-header row">
        <div class="col-6 text-left">
            <img src="{{asset("assets/img/header.jpeg")}}" style="width: 70%;" alt="Consorcio Express">
        </div>
        <div class="col-6 pl-5">
            <div class="row-cols-12 text-right">
                Nota Nro: <span class="text-monospace ml-2 text-danger"> {{$nota->ctrl_factura}}</span>
            </div>
            <div class="row-cols-12 text-right">
                Nro Control: <span class="text-monospace ml-2 text-danger"> {{$nota->ctrl_patio}}</span>
            </div>
            <div class="row-cols-12 text-right">
                Fecha de Emision: <span class="text-monospace ml-2"> {{$nota->fecha_emision}}</span>
            </div>
        </div>
    </div>
    <div class="card-body pt-0 pb-0 mt-3">
        <div class="row">
            <div class="col-5 text-left">
                <p>Nombre o Razon Social: <span class="text-monospace ml-2"> {{$nota->nombre_c}}</span></p>
                <p>Domicilio Fiscal: <span class="text-monospace ml-2"> {{$nota->direccion_c}}</span></p>
            </div>
            <div class="col-4 text-left">
                <p>Cedula o Rif: <span class="text-monospace ml-2"> {{$nota->cedula_c}}</span></p>
                <p>Teléfono: <span class="text-monospace ml-2"> {{$nota->telefono}}</span></p>
            </div>
            <div class="col-3 text-left">
                <p>Codigo de Cliente: <span class="text-monospace ml-2"> {{$nota->cod_cliente}}</span></p>
            </div>
        </div>
        <div class="row mt-3">
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
                        $tipo = $nota->cliente;
                        $pesos = json_decode($nota->pesos);
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
@endsection
