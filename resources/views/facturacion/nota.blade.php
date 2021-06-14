@extends("theme.$theme.layout")
@section('titulo')
    Nota de entrega
@endsection
@section('contenido')

<a href="crear_nota_entrega" class="btn btn-primary shadow mb-3 float-right">
    <span class="text-white">
        Crear Nueva Nota
    </span>
</a>
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
            <th colspan="1">08-02-54</th>
            <th colspan="1">Nro. Control de Patio</th>
            <th colspan="1">00041</th>
            <th colspan="1">Nro. Control de Factura</th>
            <th colspan="1">051515</th>
        </tr>
        <tr>
            <th colspan="2">Codigo del Cliente:</th>
            <th colspan="5">CODC-0241</th>
        </tr>
        <tr class="border">
            <th colspan="2">Nombre o Razon Social:</th>
            <th colspan="5">Fernando Miranda</th>
        </tr>
        <tr class="border">
            <th colspan="2">Cédula o Rif:</th>
            <th colspan="5">21493193</th>
        </tr>
        <tr class="border">
            <th colspan="2">Teléfono:</th>
            <th colspan="5">04123759129</th>
        </tr>
        <tr class="border">
            <th colspan="2">Domicilio Fiscal:</th>
            <th colspan="5">La Hoyada</th>
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
            <th>83,56</th>
            <th>21-05-21</th>
            <th>Efectivo</th>
            <th>N/P</th>
            <th>83,56</th>
            <th>0,00</th>
            <th>0,00</th>
        </tr>
        <tr>
            <th colspan="4" class="text-center align-bottom">Recibo Conforme</th>
            <th colspan="3">Disculpe por la demora, trabajamos para su satisfacción.</th>
        </tr>
    </table>
</small>

@endsection