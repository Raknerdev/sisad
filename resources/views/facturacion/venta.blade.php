@extends("theme.$theme.layout")
@section('titulo')
    Factura de Venta
@endsection
@section('contenido')

<a href="crear_factura_venta" class="btn btn-primary shadow mb-3 float-right">
    <span class="text-white">
        Crear Nueva Factura
    </span>
</a>
<small>
    <table class="bg-white table table-bordered text-black">
        <tr>
            <th colspan="6" rowspan="3" style="width: 65%;">
                <img src="{{asset("assets/img/header.jpeg")}}" style="width: 60%;" alt="Consorcio Express">
            </th>
            <th>Factura Nro:</th>
            <th>00000</th>
        </tr>
    
    
        <tr>
            <th>Nro Control:</th>
            <th>00000</th>
        </tr>
        <tr>
            <th>Fecha de Emision:</th>
            <th>12/05/21</th>
        </tr>
    
        <tr>
            <th colspan="2">Nombre o Razon Social:</th>
            <th colspan="6">José Guzman</th>
        </tr>
    
        <tr>
            <th colspan="2">Cedula o Rif:</th>
            <th colspan="6">10230572</th>
        </tr>
    
        <tr>
            <th colspan="2">Telefono:</th>
            <th colspan="6">04243301204</th>
        </tr>
    
        <tr>
            <th colspan="2">Domicilio Fiscal:</th>
            <th colspan="6">Av. oeste 05 edf. Los Jardines</th>
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
    
        <tr >
            <th colspan="6" rowspan="3" class="text-center align-bottom">Recibo Conforme</th>
            <th>Sub Total</th>
            <th colspan="2">241.76</th>
        </tr>
        <tr>
            <th colspan="2">
    
            </th>
        </tr>
        <tr>
            <th>Total a pagar</th>
            <th colspan="2">241.76</th>
        </tr>
    
        <tr>
            <th colspan="8">Nota: no se aceptan devoluciones ni camios.</th>
        </tr>
        <tr class="text-center">
            <th>Forma de Pago:</th>
            <th>Efectivo X</th>
            <th>Tarjeta de credito</th>
            <th>Transferncia</th>
        </tr>
    </table>
</small>

@endsection