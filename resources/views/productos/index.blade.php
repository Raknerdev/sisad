@extends("theme.$theme.layout")
@section('titulo')
    Productos
@endsection
@section('contenido')
{{--  Modal Agregar Producto --}}
<div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header row d-inline">
                <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center ml-4">Agregar Producto</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="{{url('agregar_producto')}}" enctype="multipart/form-data"  id="form-nuevo">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="codigo" class="control-label col-sm-6">Codigo de producto</label>
                        <div class="col-6">
                            <input class="form-control" id="codigo" type="text" name="codigo" placeholder="COD-0024" pattern="[A-Za-z0-9_-]{1,15}" style="text-transform:uppercase;" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="control-label col-sm-6">Nombre de producto</label>
                        <div class="col-6">
                            <input class="form-control" id="nombre" type="text" name="nombre" placeholder="MIXTO" pattern="[A-Za-z]{1,20}" style="text-transform:uppercase;" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precio_vip" class="control-label col-sm-6">Precio VIP</label>
                        <div class="col-6">
                            <input class="form-control" id="precio_vip" type="text" name="precio_vip" placeholder="4.50" pattern="[0-9.]{1,10}" style="text-transform:uppercase;" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precio_mayor" class="control-label col-sm-6">Precio al Mayor</label>
                        <div class="col-6">
                            <input class="form-control" id="precio_mayor" type="text" name="precio_mayor" placeholder="2.80" pattern="[0-9.]{1,10}" style="text-transform:uppercase;" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precio_detal" class="control-label col-sm-6">Precio al Detal</label>
                        <div class="col-6">
                            <input class="form-control" id="precio_detal" type="text" name="precio_detal" placeholder="0.90" pattern="[0-9.]{1,10}" style="text-transform:uppercase;" required>
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
                <h3  class="d-inline">Lista de Productos</h3>
                <button class="d-inline btn btn-info shadow float-right" id="btn-creacion" 
                data-toggle="modal" data-target="#creacion" name="Agregar Producto">
                    Agregar Producto 
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="productos" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre de Producto</th>
                        <th>Precio VIP</th>
                        <th>Precio al Mayor</th>
                        <th>Precio al Detal</th>
                        <th>Acción</th>
                      </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($products as $product)
                    <tr>
                        <th>{{$product->codigo}}</th>
                        <th>{{$product->name}}</th>
                        <th>{{$product->precio_vip}}$</th>
                        <th>{{$product->precio_m}}$</th>
                        <th>{{$product->precio_d}}$</th>
                        <th class="text-center">
                            <a href="#" class="d-inline btn btn-warning shadow fas fa-edit">
                                Editar
                            </a>
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