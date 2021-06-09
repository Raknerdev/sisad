@extends("theme.$theme.layout")
@section('titulo')
    Personal
@endsection
@section('contenido')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lista de Personal</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre de Usuario</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th>{{$user->username}}</th>
                <th>{{$user->name}}</th>
                <th>{{$user->last_name}}</th>
                <th>{{$user->email}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
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
        $("#example1").DataTable({
          "responsive": true, 
          "lengthChange": false, 
          "autoWidth": false,
          "ordering": true,
          "info": true,
          "buttons": ["csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
  </script>
@endsection