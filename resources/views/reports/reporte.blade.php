@extends("theme.$theme.layout")
@section('titulo')
    Reporte 
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
@endsection
@section('contenido')
<div class="container-fluid mt-4 mb-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-resumen-tab" data-toggle="pill" href="#custom-tabs-four-resumen" role="tab" aria-controls="custom-tabs-four-resumen" aria-selected="true">Resumen del día</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-pendientes-tab" data-toggle="pill" href="#custom-tabs-four-pendientes" role="tab" aria-controls="custom-tabs-four-pendientes" aria-selected="false">Pendientes General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-completadas-tab" data-toggle="pill" href="#custom-tabs-four-completadas" role="tab" aria-controls="custom-tabs-four-completadas" aria-selected="false">Completadas General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-general-tab" data-toggle="pill" href="#custom-tabs-four-general" role="tab" aria-controls="custom-tabs-four-general" aria-selected="false">Facturas General</a>
                        </li>
                    </ul>
                </div>
            <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-resumen" role="tabpanel" aria-labelledby="custom-tabs-four-resumen-tab">
                    <div class="productos_wrapper dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div  class="col-md-12">
                                <table class="productos table table-bordered table-striped dataTables_wrapper dt-bootstrap4">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Item</th>
                                            <th>Fecha</th>
                                            <th>Nro. Factura</th>
                                            <th>Nombre de Cliente</th>
                                            <th>Monto</th>
                                            <th>Abono</th>
                                            <th>Resta</th>
                                            <th>Descontado por Deuda</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $total_monto = 0;
                                            $total_abono = 0;
                                            $total_resta = 0;
                                            $total_descuento = 0;
                                            $item = 0;
                                        @endphp
                                        @foreach ($reportes as $reporte)
                                        @if ($reporte->estado != 'Anulada' && $reporte->fecha_emision == date("Y-m-d"))
                                        <tr>
                                            <td>{{$item = $item+1}}</td>
                                            <td>{{$reporte->fecha_emision}}</td>
                                            <td>{{$reporte->ctrl_factura}}</td>
                                            <td>{{$reporte->nombre_c}}</td>
                                            <td>{{$reporte->total}}$</td>
                                            <td>{{$reporte->abono}}$</td>
                                            <td>{{$resta = $reporte->resta - $reporte->descuento}}$</td>
                                            <td>
                                                @if ($reporte->descuento > 0)
                                                    {{$reporte->descuento}}$
                                                @else
                                                    0$
                                                @endif
                                            </td>
                                            <td>{{$reporte->estado}}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('v_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('e_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                                    @auth
                                                    <a href="{{ route('d_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endauth
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $total_monto = $total_monto + $reporte->total;
                                            $total_abono = $total_abono + $reporte->abono;
                                            $total_resta = $total_resta + $reporte->resta;
                                            $total_descuento = $total_descuento + $reporte->descuento;
                                        @endphp
                                        @endif
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th colspan="3"></th>
                                            <th>Total</th>
                                            <th>{{$total_monto}}$</th>
                                            <th>{{$total_abono}}$</th>
                                            <th>{{$total_resta-$total_descuento}}$</th>
                                            <th>{{$total_descuento}}$</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </tfoot>         
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-pendientes" role="tabpanel" aria-labelledby="custom-tabs-four-pendientes-tab">
                    <div class="productos_wrapper dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div  class="col-md-12">
                                <table class="productos table table-bordered table-striped dataTables_wrapper dt-bootstrap4">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Item</th>
                                            <th>Fecha</th>
                                            <th>Nro. Factura</th>
                                            <th>Nombre de Cliente</th>
                                            <th>Monto</th>
                                            <th>Abono</th>
                                            <th>Resta</th>
                                            <th>Descontado por Deuda</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $total_monto = 0;
                                            $total_abono = 0;
                                            $total_resta = 0;
                                            $total_descuento = 0;
                                            $item = 0;
                                        @endphp
                                        @foreach ($reportes as $reporte)
                                        @if ($reporte->estado == 'Pendiente')
                                        <tr>
                                            <td>{{$item = $item+1}}</td>
                                            <td>{{$reporte->fecha_emision}}</td>
                                            <td>{{$reporte->ctrl_factura}}</td>
                                            <td>{{$reporte->nombre_c}}</td>
                                            <td>{{$reporte->total}}$</td>
                                            <td>{{$reporte->abono}}$</td>
                                            <td>{{$reporte->resta}}$</td>
                                            <td>
                                                @if ($reporte->descuento > 0)
                                                    {{$reporte->descuento}}$
                                                @else
                                                    0$
                                                @endif
                                            </td>
                                            <td>{{$reporte->estado}}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('v_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('e_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                                    @auth
                                                    <a href="{{ route('d_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endauth
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $total_monto = $total_monto + $reporte->total;
                                            $total_abono = $total_abono + $reporte->abono;
                                            $total_resta = $total_resta + $reporte->resta;
                                            $total_descuento = $total_descuento + $reporte->descuento;
                                        @endphp
                                        @endif
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th colspan="3"></th>
                                            <th>Total</th>
                                            <th>{{$total_monto}}$</th>
                                            <th>{{$total_abono}}$</th>
                                            <th>{{$total_resta}}$</th>
                                            <th>{{$total_descuento}}$</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </tfoot>         
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-completadas" role="tabpanel" aria-labelledby="custom-tabs-four-completadas-tab">
                    <div class="productos_wrapper dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div  class="col-md-12">
                                <table class="productos table table-bordered table-striped dataTables_wrapper dt-bootstrap4">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Item</th>
                                            <th>Fecha</th>
                                            <th>Nro. Factura</th>
                                            <th>Nombre de Cliente</th>
                                            <th>Monto</th>
                                            <th>Abono</th>
                                            <th>Resta</th>
                                            <th>Descontado por Deuda</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $total_monto = 0;
                                            $total_abono = 0;
                                            $total_resta = 0;
                                            $total_descuento = 0;
                                            $item = 0;
                                        @endphp
                                        @foreach ($reportes as $reporte)
                                        @if ($reporte->estado == 'Completada')
                                        <tr>
                                            <td>{{$item = $item+1}}</td>
                                            <td>{{$reporte->fecha_emision}}</td>
                                            <td>{{$reporte->ctrl_factura}}</td>
                                            <td>{{$reporte->nombre_c}}</td>
                                            <td>{{$reporte->total}}$</td>
                                            <td>{{$reporte->abono}}$</td>
                                            <td>{{$reporte->resta}}$</td>
                                            <td>
                                                @if ($reporte->descuento > 0)
                                                    {{$reporte->descuento}}$
                                                @else
                                                    0$
                                                @endif
                                            </td>
                                            <td>{{$reporte->estado}}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('v_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('e_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                                    @auth
                                                    <a href="{{ route('d_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endauth
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $total_monto = $total_monto + $reporte->total;
                                            $total_abono = $total_abono + $reporte->abono;
                                            $total_resta = $total_resta + $reporte->resta;
                                            $total_descuento = $total_descuento + $reporte->descuento;
                                        @endphp
                                        @endif
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th colspan="3"></th>
                                            <th>Total</th>
                                            <th>{{$total_monto}}$</th>
                                            <th>{{$total_abono}}$</th>
                                            <th>{{$total_resta}}$</th>
                                            <th>{{$total_descuento}}$</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </tfoot>         
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-general" role="tabpanel" aria-labelledby="custom-tabs-four-general-tab">
                    <div class="productos_wrapper dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div  class="col-md-12">
                                <table class="productos table table-bordered table-striped dataTables_wrapper dt-bootstrap4">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Item</th>
                                            <th>Fecha</th>
                                            <th>Nro. Factura</th>
                                            <th>Nombre de Cliente</th>
                                            <th>Monto</th>
                                            <th>Abono</th>
                                            <th>Resta</th>
                                            <th>Descontado por Deuda</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $total_monto = 0;
                                            $total_abono = 0;
                                            $total_resta = 0;
                                            $total_descuento = 0;
                                            $item = 0;
                                        @endphp
                                        @foreach ($reportes as $reporte)
                                        <tr>
                                            <td>{{$item = $item+1}}</td>
                                            <td>{{$reporte->fecha_emision}}</td>
                                            <td>{{$reporte->ctrl_factura}}</td>
                                            <td>{{$reporte->nombre_c}}</td>
                                            <td>{{$reporte->total}}$</td>
                                            <td>{{$reporte->abono}}$</td>
                                            <td>{{$reporte->resta}}$</td>
                                            <td>
                                                @if ($reporte->descuento > 0)
                                                    {{$reporte->descuento}}$
                                                @else
                                                    0$
                                                @endif
                                            </td>
                                            <td>{{$reporte->estado}}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('v_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('e_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                                    @auth
                                                    <a href="{{ route('d_nota', ['id'=>encrypt("$reporte->id")]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endauth
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $total_monto = $total_monto + $reporte->total;
                                            $total_abono = $total_abono + $reporte->abono;
                                            $total_resta = $total_resta + $reporte->resta;
                                            $total_descuento = $total_descuento + $reporte->descuento;
                                        @endphp
                                        
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot class="text-center ">
                                        <tr>
                                            <th colspan="3"></th>
                                            <th>Total</th>
                                            <th>{{$total_monto}}$</th>
                                            <th>{{$total_abono}}$</th>
                                            <th>{{$total_resta}}$</th>
                                            <th>
                                                @if ($total_descuento > 0)
                                                    {{$total_descuento}}$
                                                @else
                                                    0$
                                                @endif
                                            </th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </tfoot>         
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script> --}}
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/jszip/jszip.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>

<script>
    $(function () {
        $(".productos").DataTable({
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).container().appendTo('.productos_wrapper .col-md-6:eq(0)');
    });
    
</script>
@endsection