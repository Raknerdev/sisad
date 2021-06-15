@extends("theme.$theme.layout")
@section('titulo')
    Factura de Venta
@endsection
@section('contenido')
<small>
    <table class="bg-white table table-bordered text-black">
        <tr>
            <th colspan="6" rowspan="3" style="width: 65%;">
                <img src="{{asset("assets/img/header.jpeg")}}" style="width: 60%;" alt="Consorcio Express">
            </th>
            <th>Factura Nro:</th>
            <th>{{$venta->nro_factura}}</th>
        </tr>
    
    
        <tr>
            <th>Nro Control:</th>
            <th>{{$venta->nro_control}}</th>
        </tr>
        <tr>
            <th>Fecha de Emision:</th>
            <th>{{$venta->created_at}}</th>
        </tr>
    
        <tr>
            <th colspan="2">Nombre o Razon Social:</th>
            <th colspan="6">{{$venta->nombre_c}}</th>
        </tr>
    
        <tr>
            <th colspan="2">Cedula o Rif:</th>
            <th colspan="6">{{$venta->cedula_c}}</th>
        </tr>
    
        <tr>
            <th colspan="2">Telefono:</th>
            <th colspan="6">{{$venta->telefono}}</th>
        </tr>
    
        <tr>
            <th colspan="2">Domicilio Fiscal:</th>
            <th colspan="6">{{$venta->direccion_c}}</th>
        </tr>
    
        <tr>
            <th colspan="8"></th>
        </tr>
    
        <tr class="text-center">
            <th>Codigo</th>
            <th colspan="4">Producto</th>
            <th>Cantidad</th>
            <th> Precio Unitario</th>
            <th>Total</th>
        </tr>
        {{--  Agregar los Productos  --}}
        <tr>
            <th></th>
            <th colspan="4"></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        {{-- Fin Agregar los Productos  --}}
    
        <tr>
            <th colspan="6" rowspan="3" class="text-center align-bottom">Recibo Conforme</th>
            <th class="text-center">Sub Total</th>
            <th colspan="2">{{$venta->sub_total}}</th>
        </tr>
        <tr>
            <th colspan="2">
    
            </th>
        </tr>
        <tr>
            <th class="text-center">Total a pagar</th>
            <th colspan="2">{{$venta->total}}</th>
        </tr>
    
        <tr>
            <th colspan="8">Nota: no se aceptan devoluciones ni camios.</th>
        </tr>
        <tr class="text-center">
            <th>Forma de Pago:</th>
            <th colspan="7" class="text-left">{{$venta->forma_pago}}</th>
        </tr>
    </table>
</small>
@endsection
