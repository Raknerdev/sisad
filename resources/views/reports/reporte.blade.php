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
                        <th>Nombre de Cliente</th>
                        <th>Monto</th>
                        <th>Abono</th>
                        <th>Resta</th>
                        <th>Descontado por Deuda</th>
                        <th>Obervacion</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($reportes as $reporte)
                    <tr>
                        <th>{{$reporte->id}}</th>
                        <th>{{$reporte->fecha}}</th>
                        <th>{{$reporte->nombre}}$</th>
                        <th>{{$reporte->monto}}$</th>
                        <th>{{$reporte->abono}}$</th>
                        <th>{{$reporte->resta}}$</th>
                        <th>{{$reporte->descuento}}$</th>
                        <th>{{$reporte->observacion}}$</th>
                        <th>
                            <div class="btn-group btn-group-sm bg-white">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <th colspan="2"></th>
                        <th>Totales</th>
                        <th>{{$totalMonto}}</th>
                        <th>{{$totalAbono}}</th>
                        <th>{{$totalResta}}</th>
                        <th>{{$totalDescontado}}</th>
                        <th></th>
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
            "searching": false,
            "lengthChange": false,
            "autoWidth": false,
            {{--  "buttons": ["excel", "pdf", "print"]  --}}
        }).buttons().container().appendTo('#productos_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection