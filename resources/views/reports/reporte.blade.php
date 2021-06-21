@extends("theme.$theme.layout")
@section('titulo')
    Reporte 
@endsection
@section('contenido')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="productos" class="table table-bordered table-striped">
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
                    @if ($reporte->estado != 'Anulada')
                    <tr>
                        <td>{{$item = $item+1}}</td>
                        <td>{{$reporte->fecha_emision}}</td>
                        <td>{{$reporte->ctrl_factura}}</td>
                        <td>{{$reporte->nombre_c}}</td>
                        <td>{{$reporte->total}}$</td>
                        <td>{{$reporte->abono}}$</td>
                        <td>{{$resta = $reporte->resta - $reporte->abono}}$</td>
                        <td>{{$reporte->descuento}}$</td>
                        <td>{{$reporte->estado}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/view_nota/{{encrypt("$reporte->id")}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="/edit_nota/{{encrypt("$reporte->id")}}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                @auth
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                @endauth
                            </div>
                        </td>
                    </tr>
                    @php
                        $total_monto = $total_monto + $reporte->total;
                        $total_abono = $total_abono + $reporte->abono;
                        $total_resta = $total_resta + $resta;
                        $total_descuento = $total_descuento + $reporte->descuento;
                    @endphp
                    @endif
                    @endforeach
                    
                </tbody>
                <tfoot class="text-center bg-lightblue">
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
            <!-- /.card-body -->
          </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
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
        $("#productos").DataTable({
            "responsive": true,
            "searching": true,
            "lengthChange": false,
            "autoWidth": false,
            {{--  "buttons": ["excel", "pdf", "print"]  --}}
        }).buttons().container().appendTo('#productos_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection