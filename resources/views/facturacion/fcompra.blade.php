@extends("theme.$theme.layout")
@section('titulo')
    Factura de Compra
@endsection
@section('contenido')
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
            <th>{{$compra->tipo_cliente}}</th>
            <th>Nro. Control de Patio</th>
            <th>{{$compra->nro_ctrl_patio}}</th>
            <th>Nro. Control de Factura</th>
            <th>{{$compra->nro_ctrl_factura}}</th>
        </tr>
        <tr>
            <th>Fecha: </th>
            <th>{{$compra->created_at}}</th>
            <th colspan="4"></th>
        </tr>
        <tr>
            <th colspan="2">Código de cliente:</th>
            <th colspan="4">{{$compra->cod_cliente}}</th>
        </tr>
        <tr>
            <th colspan="2">Nombre o razón social:</th>
            <th colspan="4">{{$compra->nombre_c}}</th>
        </tr>
        <tr>
            <th colspan="2">Cédula o Rif:</th>
            <th colspan="4">{{$compra->cedula_c}}</th>
        </tr>
    
        <tr>
            <th colspan="2">Teléfono:</th>
            <th colspan="4">{{$compra->telefono}}</th>
        </tr>
    
        <tr>
            <th colspan="2">Domicilio Fiscal:</th>
            <th colspan="4">{{$compra->direccion_c}}</th>
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
            <th colspan="2">{{$compra->total_peso_prod}}</th>
        </tr>
        <tr>
            <th colspan="5" class="text-center align-bottom">Recibo Conforme</th>
            <th colspan="2" class="text-center"><p>Sub Total: {{$compra->sub_total}}<br> 16% IVA: {{$compra->sub_total}} <br> Total a Pagar: {{$compra->total}}</p></th>
        </tr>
        <tr>
        </tr>
    </table>
</small>
@endsection