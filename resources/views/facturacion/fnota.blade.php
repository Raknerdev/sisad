@extends("theme.$theme.layout")
@section('titulo')
    Nota de entrega
@endsection
@section('contenido')
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
                <p>Código de Cliente: <span class="text-monospace ml-2"> {{$nota->cod_cliente}}</span></p>
            </div>
        </div>
        <div class="row mt-3 text-monospace">
            <table class="table table-striped">
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
                        $costo = $costo + round($cost);
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
