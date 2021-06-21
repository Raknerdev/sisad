@extends("theme.$theme.layout")
@section('titulo')
    Nota de entrega
@endsection
@section('contenido')
<small>
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
</small> 
@endsection
