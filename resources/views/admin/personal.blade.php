@extends("theme.$theme.layout")
@section('titulo')
    Personal
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
@endsection
@section('contenido')
{{--  Modal Agregar Producto --}}
<div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header row d-inline">
                <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center ml-4">Agregar Usuario</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="/agregar_usuario" enctype="multipart/form-data"  id="form-nuevo">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="control-label col-sm-6">Nombre de Usuario</label>
                        <div class="col-6">
                            <input class="form-control" id="username" type="text" name="username" placeholder="fmiranda" pattern="[A-Za-z]{1,15}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="control-label col-sm-6">Nombre</label>
                        <div class="col-6">
                            <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Fernando " pattern="[A-Za-z ]{1,15}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="control-label col-sm-6">Apellido</label>
                        <div class="col-6">
                            <input class="form-control" id="apellido" type="text" name="apellido" placeholder="Miranda" pattern="[A-Za-z ]{1,15}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="control-label col-sm-6">Correo</label>
                        <div class="col-6">
                            <input class="form-control" id="correo" type="email" name="correo" placeholder="correo@correo.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="control-label col-sm-6">Contrase??a</label>
                        <div class="col-6">
                            <input class="form-control" id="password" type="password" name="password" placeholder="*********">
                        </div>
                    </div>
                    <div class="form-group modal-footer d-inline">
                        <button type="submit" class="btn btn-primary float-left ml-5" id="btn-nuevo">
                            Registrar
                        </button>
                        <button type="button" class="btn btn-danger float-right mr-5" data-dismiss="modal">Cancelar</button>
                    </div>
                    {{--  Cargar Archivo
                    <div class="form-group">
                        <label for="c_documento" class="col-md-4 control-label">Archivo</label>
                        <div class="col-md-6">
                            <input type="file" required name="archivo" id="archivo" name="archivo"/>
                        </div>
                    </div>  
                    --}}
                </form>
              <br><br>
              {{$success = Session::get('success')}}
              @if ($success)
                  <div class="alert alert-success">
                      <strong>!!Felicidades!!</strong>Se Creo el usuario Correctamente <br><br>
                  </div>
              @endif
            </div>
        </div>
    </div>
</div>
{{--  Fin Modal Agregar Producto  --}}

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3  class="d-inline">Lista de Usuarios</h3>
                <button class="d-inline btn btn-info shadow float-right" id="btn-creacion" 
                data-toggle="modal" data-target="#creacion" name="Agregar Producto">
                    Agregar Usuario 
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="productos" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Acci??n</th>
                      </tr>
                </thead>
                <tbody class="text-center">
                  @foreach ($users as $user)
                  <tr>
                      <th>{{$user->id}}</th>
                      <th>{{$user->username}}</th>
                      <th>{{$user->name}}</th>
                      <th>{{$user->last_name}}</th>
                      <th>{{$user->email}}</th>
                      <th>
                        <div class="btn-group btn-group-sm bg-dark">
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </th>
                  </tr>
                  @endforeach
                </tbody>
                
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

            