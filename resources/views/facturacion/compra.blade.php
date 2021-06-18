@extends("theme.$theme.layout")
@section('titulo')
    Factura de Compra
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset("assets/lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endsection
@section('contenido')
{{--  Modal Agregar Factura --}}
<div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header row d-inline">
                <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center ml-4">Crear Factura de Compra</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="/agregar_compra" enctype="multipart/form-data"  id="form-nuevo">
                    @csrf
                    <div class="form-group row">
                        <label for="cliente" class="control-label col-sm-6">Nombre de CLiente</label>
                        <div class="col-6">
                            <select class="form-control" name="cliente" id="cliente" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="producto" class="control-label col-sm-6">Producto</label>
                        <div class="col-6">
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" name="producto[]" id="producto" data-placeholder="Seleccione Producto" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row" id="canciones">
                    </div>
                    <div class="form-group modal-footer d-inline">
                        <button type="submit" class="btn btn-primary float-left ml-5" id="btn-nuevo">
                            Generar
                        </button>
                        <button type="button" class="btn btn-danger float-right mr-5" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                    {{--  Cargar Archivo
                    <div class="form-group">
                        <label for="c_documento" class="col-md-4 control-label">Archivo</label>
                        <div class="col-md-6">
                            <input type="file" required name="archivo" id="archivo" name="archivo"/>
                        </div>
                    </div>  
                    --}}
                    <!-- El id="canciones" indica que la función de JavaScript dejará aquí el resultado -->
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
{{--  Fin Modal Agregar Factura  --}}

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3  class="d-inline">Facturas de Venta</h3>
                <button class="d-inline btn btn-info shadow float-right" id="btn-creacion" 
                data-toggle="modal" data-target="#creacion" name="Agregar Producto">
                    Nueva Factura 
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="productos" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Emsión</th>
                        <th>Nro. Factura</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Esatado</th>
                        <th>Acción</th>
                      </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $cont = 0;
                    @endphp
                  @foreach ($facturas as $factura)
                  <tr>
                      <th>{{$cont=$cont+1}}</th>
                      <th>{{$factura->created_at}}</th>
                      <th>{{$factura->nro_ctrl_factura}}</th>
                      <th>{{$factura->nombre_c}}</th>
                      <th>{{$factura->total}}</th>
                      <th>{{$factura->estado}}</th>
                      <th>
                        <div class="btn-group btn-group-sm bg-dark">
                          <a href="/view_compra/{{$factura->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="/compra_destroy/{{$factura->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
<script src="{{asset("assets/lte/plugins/select2/js/select2.full.min.js")}}"></script>
<script>
    $(function() {
        $('.select2').select2()
        $('#btn-creacion').on('click', function () {
            event.preventDefault();
            var url =  "{{ url('/list_clientes')}}";
            var urlProd =  "{{ url('/list_prodcts')}}";
            // console.log(url);
            $.get(url, function(data, status)
            {
              var $el = $("#cliente");
              $el.empty();
              $.each(data, function(key,value) {
                $el.append($("<option></option>")
                   .attr("value", key+1).text(value.nombre));
              });
               console.log(data);
            }).fail(function()
            {
               console.log("Error");
            });
            $.get(urlProd, function(data, status)
            {
              var $el = $("#producto");
              $el.empty();
              $.each(data, function(key,value) {
                $el.append($("<option></option>")
                   .attr("value", key+1).text(value.name));
              });
               console.log(data);
            }).fail(function()
            {
               console.log("Error");
            });
          });
        }
    );
</script>
@endsection