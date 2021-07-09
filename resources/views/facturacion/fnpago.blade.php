@extends("theme.$theme.layout")
@section('titulo')
    Nota de entrega
@endsection
@section('contenido')
    <table class="bg-white table table-bordered text-black text-monospace">
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
            <td rowspan="3" style="width: 12%;"></td>
            <td colspan="2" >Codigo de Cliente: <span class="ml-2 text-danger"> {{$nota->cod_cliente}}</span></td>
            <td colspan="2">Nro. Control <span class="ml-2 text-danger">{{$nota->ctrl_patio}}</span></td>
            <td colspan="2">Nota Nro. <span class="ml-2 text-danger">{{$nota->ctrl_factura}}</span></td>
        </tr>
        <tr>
            <td colspan="3">Nombre o Razon Social: <span class="ml-2"> {{$nota->nombre_c}}</span></td>
            <td colspan="3">Cédula o Rif: <span class="ml-2"> {{$nota->cedula_c}}</span></td>
        </tr>
        <tr>
            <td colspan="3">Domicilio Fiscal: <span class="ml-2"> {{$nota->direccion_c}}</span></td>
            <td colspan="6">Teléfono: <span class="ml-2">{{$nota->telefono}}</span></td>
        </tr>
        <tr class="text-center" style="background: #28a745; color: black">
            <th colspan="7">
                Condiciones de Pago
            </th>
        </tr>
        <tr class="text-center">
            <th>Total a Pagar</th>
            <th style="width: 12%;">Fecha</th>
            <th style="width: 15%;">Forma de Pago</th>
            <th style="width: 10%;">Ref.</th>
            <th style="width: 10%;">Abona</th>
            <th style="width: 10%;">Debe</th>
            <th style="width: 10%;">Resta</th>
        </tr>
        <tr class="text-center">
            <td>{{round($nota->total)}}$</td>
            <td>{{$nota->fecha_pago}}</td>
            <td>
                @if ($nota->forma_pago)
                    {{$nota->forma_pago}}
                @else
                    N/P
                @endif
            </td>
            <td>{{$nota->ref}}</td>
            <td>{{round($nota->abono)}}$</td>
            <td>{{round($nota->debe)}}$</td>
            <td>{{round($nota->resta)}}$</td>
        </tr>
        <tr>
            <td colspan="4" class="text-center align-bottom">
                <small>
                    {{--  Recibo Conforme  --}}
                </small>
            </td>
            <td colspan="3" class="text-center">
                <small>
                    Disculpe por la demora, trabajamos para su satisfacción.
                </small>
            </td>
        </tr>
    </table>
@endsection