@extends("theme.$theme.layout")
@section('titulo')
    Factura de Compra
@endsection
@section('contenido')

<a href="crear_factura_compra" class="btn btn-primary shadow mb-3 float-right">
    <span class="text-white">
        Crear Nueva Factura
    </span>
</a>
<small>
    <table class="bg-white table table-bordered text-black">
        <tr>
            <th colspan="7">
                <img src="{{asset("assets/img/header.jpeg")}}" style="width: 40%;" alt="Consorcio Express">
            </th>
        </tr>
        <tr>
            <th rowspan="7" style="width: 15%;"></th>
            <th>Tipo de cliente</th>
            <th>Minorista</th>
            <th>Nro. Control de Patio</th>
            <th>00000</th>
            <th>Nro. Control de Factura</th>
            <th>00000</th>
        </tr>
        <tr>
            <th>Fecha: </th>
            <th></th>
            <th colspan="4"></th>
        </tr>
        <tr>
            <th colspan="2">Código de cliente:</th>
            <th colspan="4"> 0 </th>
        </tr>
        <tr>
            <th colspan="2">Nombre o razón social:</th>
            <th colspan="4">Pedro Alvarez</th>
        </tr>
        <tr>
            <th colspan="2">Cédula o Rif:</th>
            <th colspan="4">00000000</th>
        </tr>
    
        <tr>
            <th colspan="2">Teléfono:</th>
            <th colspan="4">00000000000</th>
        </tr>
    
        <tr>
            <th colspan="2">Domicilio Fiscal:</th>
            <th colspan="4">Coche</th>
        </tr>
    
        <tr class="text-center" style="background: #28a745; color: black">
            <th colspan="7">
                Factura de Compra
            </th>
        </tr>
        <tr class="text-center">
            <th>Ítem</th>
            <th>Código</th>
            <th colspan="3">Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
        </tr>
        {{--  Agregar Productos  --}}
        <tr class="text-center">
            <th>1</th>
            <th>P003-MIX</th>
            <th colspan="3">Mixto</th>
            <th>90kg</th>
            <th>0,80</th>
        </tr>
        {{--  Fin Lista de Productos  --}}
        <tr class="text-center">
            <th colspan="5">Total Cantidad de Producto</th>
            <th colspan="2">72,00</th>
        </tr>
        <tr>
            <th colspan="5" class="text-center align-bottom">Recibo Conforme</th>
            <th colspan="2" class="text-center"><p>Sub Total: 72,00<br> 16% IVA: 11,52 <br> Total a Pagar: 83,52</p></th>
        </tr>
        <tr>
            
        </tr>
    </table>
</small>

@endsection