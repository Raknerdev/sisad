@extends("theme.$theme.layout")
@section('titulo')
    Nota de entrega
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
<script language="JavaScript">
    function aggProd() {
        var p = document.querySelector(".produ");
        var p_prime = p.cloneNode(true);
        document.getElementById('productos').appendChild(p_prime);
    }
</script>
@endsection
@section('contenido')
{{--  Modal Agregar Factura --}}
<div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header row d-inline ml-2 mr-">
                <button type="button" class="close mt-1 mr-1 p-0" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center ml-4">Crear Nueva Nota</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('agg_nota') }}" enctype="multipart/form-data"  id="form-nuevo">
                    @csrf
                    <div class="form-group row">
                        <label for="fecha" class="control-label col-sm-6">Fecha de Emisión</label>
                        <input class="form-control col-6" name="fecha" type="date" min="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>" required>
                    </div>
                    <div class="form-group row">
                        <label for="patio" class="control-label col-sm-6">Patio</label>
                        <select class="form-control col-sm-6" name="patio" required>
                            <option selected disabled>Selecct</option>
                            <option value="1">Patio I</option>
                            <option value="2">Patio II</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="cliente" class="control-label col-sm-6">Nombre de CLiente</label>
                        <select class="form-control col-sm-6" name="cliente" id="cliente" required>
                        </select>
                    </div>
                    {{--  <div class="form-group row">
                        <label for="forma_pago" class="control-label col-sm-6">Forma de Pago</label>
                        <select class="form-control col-sm-6" name="forma_pago">
                            <option value="" selected disabled>Selecct...</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>  --}}
                    {{--  <div class="form-group row">
                        <label for="abono" class="control-label col-sm-6">Abono</label>
                        <input type="number" class="form-control col-sm-6" name="abono" placeholder="10.5" min="1" step="0.01">
                    </div>  --}}
                    <div class="form-group row">
                        <label for="avance" class="control-label col-sm-6">Avance / Descuento por deuda</label>
                        <input type="number" class="form-control col-sm-6" name="avance" placeholder="10.5" min="1" step="0.01">
                    </div>
                    <div class="form-group row">
                        <label for="obs" class="control-label col-sm-6">Observación</label>
                        <input type="text" class="form-control col-sm-6" name="obs" placeholder="Comentario." pattern="[A-Z a-z.]">
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-primary col-12" onclick="aggProd();" value="Agregar Producto" />
                    </div>
                    <div class="form-group" id="productos">
                        <div class="produ mb-3 text-left">
                            <div class="row">
                                <div id="product" class="col-sm-6">
                                    <label for="producto" class="control-label">Producto</label>
                                    <select class="form-control" name="producto[]" id="producto" required>
                                    </select>
                                </div>
                                <div id="pes" class="col-sm-6">
                                    <label for="peso" class="control-label">peso</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="peso[]" id="peso" placeholder="15.3" min="0.01" step="0.01">
                                    </div>
                                </div>
                            </div>
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
                    <h3  class="d-inline">Notas de Entrega</h3>
                    <button class="d-inline btn btn-info shadow float-right" id="btn-creacion" 
                        data-toggle="modal" data-target="#creacion" name="Agregar Producto">
                        Nueva Nota 
                    </button>
                </div>
                <div class="card-body">
                    <table id="notas" class="table table-bordered table-striped">
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
                            @foreach ($notas as $nota)
                            <tr>
                                <th>{{$cont=$cont+1}}</th>
                                <th>{{$nota->fecha_emision}}</th>
                                <th>{{$nota->ctrl_factura}}</th>
                                <th>{{$nota->nombre_c}}</th>
                                <th>{{round($nota->total)}}$</th>
                                <th>{{$nota->estado}}</th>
                                <th>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('v_nota', ['id'=>encrypt("$nota->id")]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('e_nota', ['id'=>encrypt("$nota->id")]) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                        @auth
                                        <a href="{{ route('d_nota', ['id'=>encrypt("$nota->id")]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>    
                                        @endauth
                                    </div>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                var url =  "{{ url('/list_customers')}}";
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
        });
    </script>
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
            $("#notas").DataTable({
                "responsive": true,
                "searching": true,
                "lengthChange": false,
                "autoWidth": false,
                {{--  "buttons": ["excel", "pdf", "print"]  --}}
            }).buttons().container().appendTo('#notas_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection