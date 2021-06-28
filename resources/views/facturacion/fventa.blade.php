@extends("theme.$theme.layout")
@section('titulo')
    Factura de Venta
@endsection
@section('contenido')
<small>
    <table class="bg-white table table-bordered text-black">
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
        {{--  Agregar Productos  --}}
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
        {{--  Fin Lista de Productos  --}}
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
    </table>
</small>
@endsection
