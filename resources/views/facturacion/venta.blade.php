@extends("theme.$theme.layout")
@section('titulo')
    Facturas de Venta
@endsection
@section('contenido')
{{--  Modal Agregar Factura --}}
<div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header row d-inline">
                <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center ml-4">Crear Factura de Venta</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="/agregar_venta" enctype="multipart/form-data"  id="form-nuevo">
                    @csrf
                    <div class="form-group row">
                        <label for="cliente" class="control-label col-sm-6">Nombre de CLiente</label>
                        <div class="col-6">
                            <select class="form-control" name="cliente" id="cliente">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="forma_pago" class="control-label col-sm-6">Forma de Pago</label>
                        <div class="col-6">
                            <select class="form-control" name="forma_pago">
                                <option value="Efectivo">Efectivo</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="Otro">Otro</option>
                              </select>
                        </div>
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
                        <th>Tipo de Cliente</th>
                        <th>Total</th>
                        <th>Acción</th>
                      </tr>
                </thead>
                <tbody class="text-center">
                  @foreach ($facturas as $factura)
                  <tr>
                      <th>{{$factura->id}}</th>
                      <th>{{$factura->created_at}}</th>
                      <th>{{$factura->nro_factura}}</th>
                      <th>{{$factura->nombre_c}}</th>
                      <th>{{$factura->tipo_cliente}}</th>
                      <th>{{$factura->total}}</th>
                      <th>
                        <div class="btn-group btn-group-sm bg-dark">
                          <a href="/view_venta/{{$factura->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="/venta_destroy/{{$factura->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
<script>
    $(function() {
        $('#btn-creacion').on('click', function () {
            event.preventDefault();
            var url =  "{{ url('/list_clientes')}}";
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
          });
        }
    );
</script>
@endsection