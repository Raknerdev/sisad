@extends("theme.$theme.layout")
@section('titulo')
    Clientes
@endsection
@section('contenido')
{{--  Modal Agregar Producto --}}
<div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header row d-inline">
                <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center ml-4">Agregar Cliente</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="/agregar_cliente" enctype="multipart/form-data"  id="form-nuevo">
                    @csrf
                    <div class="form-group row">
                        <label for="nombre" class="control-label col-sm-6">Nombre</label>
                        <div class="col-6">
                            <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Fernando Miranda" pattern="[A-Z a-z ]{1,30}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cedula" class="control-label col-sm-6">Cédula</label>
                        <div class="col-6">
                            <input class="form-control" id="cedula" type="text" name="cedula" placeholder="12.131.531" pattern="[0-9.]{1,10}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="control-label col-sm-6">Dirección</label>
                        <div class="col-6">
                            <input class="form-control" id="direccion" type="text" name="direccion" placeholder="Las Adjuntas">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="control-label col-sm-6">Teléfono</label>
                        <div class="col-6">
                            <input class="form-control" id="telefono" type="text" name="telefono" placeholder="(0424)112-0011" pattern="[0-9_-+()]{1,15}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo" class="control-label col-sm-6">Tipo de Cliente</label>
                        <div class="col-6">
                            <select class="form-control" name="tipo">
                              <option value="Minorista">Minorista</option>
                              <option value="Mayorista">Mayorista</option>
                              <option value="VIP">VIP</option>
                            </select>
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
                <h3  class="d-inline">Lista de Clientes</h3>
                <button class="d-inline btn btn-info shadow float-right" id="btn-creacion" 
                data-toggle="modal" data-target="#creacion" name="Agregar Producto">
                    Agregar Cliente 
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="productos" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre de Cliente</th>
                        <th>Tipo de Cliente</th>
                        <th>Facturas Registradas</th>
                        <th>Valor Total</th>
                        <th>Acción</th>
                      </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($clientes as $cliente)
                    @php
                        $total = 0;
                    @endphp
                    <tr>
                        <td>{{$cliente->codigo}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->tipo}}</td>
                        <td>{{$cliente->facturas}}</td>
                        @foreach ($seguimientos as $seguimiento )
                            @if ($seguimiento->id_cliente == $cliente->id)
                            @php
                                $total = $total + $seguimiento->total
                            @endphp
                            @endif
                        @endforeach
                        <td>{{$total}}$</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                @auth
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>    
                                @endauth
                            </div>
                        </td>
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
            "searching": true,
            "lengthChange": false,
            "autoWidth": false,
            {{--  "buttons": ["excel", "pdf", "print"]  --}}
        }).buttons().container().appendTo('#productos_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection