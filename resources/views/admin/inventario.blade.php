@extends("theme.$theme.layout")
@section('titulo')
    Almacen
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
{{--  Modal Salida de Producto --}}
<div class="modal fade" id="creacion" tabindex="-1" role="dialog" aria-labelledby="creacionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header row d-inline">
                <button type="button" class="close mr-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center ml-4">Salida de Producto</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="{{url('update_stock')}}" enctype="multipart/form-data"  id="form-nuevo">
                    {{ csrf_field() }}
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
{{--  Fin Modal Salida de Producto  --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3  class="d-inline">Total Disponible a la Fecha <?php echo date("d-m-Y");?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="inventario" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre del Producto</th>
                                <th>Total Disponible</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($registro)
                                @php
                                    $prod1 = "ACERO CORTO";
                                    $prod2 = "ACERO LARGO";
                                    $prod3 = "ALUMINIO";
                                    $prod4 = "BATERIAS";
                                    $prod5 = "CALAMINA";
                                    $prod6 = "CHATARRA";
                                    $prod7 = "CORTO PESADO";
                                    $prod8 = "DURO";
                                    $prod9 = "LARGO PESADO";
                                    $prod10 = "LATA";
                                    $prod11 = "LATON";
                                    $prod12 = "MARGINAL";
                                    $prod13 = "MIXTO";
                                    $prod14 = "MOTOR DE NEVERA";
                                    $prod15 = "PERFIL";
                                    $prod16 = "PLASTICO";
                                    $prod17 = "PLOMO CHATARRA";
                                    $prod18 = "PLOMO LINGOTE";
                                    $prod19 = "POTE";
                                    $prod20 = "RA";
                                    $prod21 = "RCA";
                                    $prod22 = "RL";
                                    $prod23 = "TARJETAS DE COMPUTADORA";
                                    $fecha = date('Y-m-d');
                                @endphp
                                @foreach ($registro as $reg)
                                    <tr><th>{{$prod1 }}</th><th>{{$reg->$prod1 }} kg</th></tr>
                                    <tr><th>{{$prod2 }}</th><th>{{$reg->$prod2 }} kg</th></tr>
                                    <tr><th>{{$prod3 }}</th><th>{{$reg->$prod3 }} kg</th></tr>
                                    <tr><th>{{$prod4 }}</th><th>{{$reg->$prod4 }} kg</th></tr>
                                    <tr><th>{{$prod5 }}</th><th>{{$reg->$prod5 }} kg</th></tr>
                                    <tr><th>{{$prod6 }}</th><th>{{$reg->$prod6 }} kg</th></tr>
                                    <tr><th>{{$prod7 }}</th><th>{{$reg->$prod7 }} kg</th></tr>
                                    <tr><th>{{$prod8 }}</th><th>{{$reg->$prod8 }} kg</th></tr>
                                    <tr><th>{{$prod9 }}</th><th>{{$reg->$prod9 }} kg</th></tr>
                                    <tr><th>{{$prod10}}</th><th>{{$reg->$prod10}} kg</th></tr>
                                    <tr><th>{{$prod11}}</th><th>{{$reg->$prod11}} kg</th></tr>
                                    <tr><th>{{$prod12}}</th><th>{{$reg->$prod12}} kg</th></tr>
                                    <tr><th>{{$prod13}}</th><th>{{$reg->$prod13}} kg</th></tr>
                                    <tr><th>{{$prod14}}</th><th>{{$reg->$prod14}} kg</th></tr>
                                    <tr><th>{{$prod15}}</th><th>{{$reg->$prod15}} kg</th></tr>
                                    <tr><th>{{$prod16}}</th><th>{{$reg->$prod16}} kg</th></tr>
                                    <tr><th>{{$prod17}}</th><th>{{$reg->$prod17}} kg</th></tr>
                                    <tr><th>{{$prod18}}</th><th>{{$reg->$prod18}} kg</th></tr>
                                    <tr><th>{{$prod19}}</th><th>{{$reg->$prod19}} kg</th></tr>
                                    <tr><th>{{$prod20}}</th><th>{{$reg->$prod20}} kg</th></tr>
                                    <tr><th>{{$prod21}}</th><th>{{$reg->$prod21}} kg</th></tr>
                                    <tr><th>{{$prod22}}</th><th>{{$reg->$prod22}} kg</th></tr>
                                    <tr><th>{{$prod23}}</th><th>{{$reg->$prod23}} kg</th></tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3  class="d-inline">Total del Día <?php echo date("d-m-Y");?></h3>
                    <button class="d-inline btn btn-info shadow float-right" id="btn-creacion" 
                    data-toggle="modal" data-target="#creacion" name="Agregar Producto">
                        Salida de Producto
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="almacen" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre del Producto</th>
                                <th>Ingreso del Día</th>
                                <th>Total Disponible</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($registro)
                                @php
                                    $prod1 = "ACERO CORTO";
                                    $prod2 = "ACERO LARGO";
                                    $prod3 = "ALUMINIO";
                                    $prod4 = "BATERIAS";
                                    $prod5 = "CALAMINA";
                                    $prod6 = "CHATARRA";
                                    $prod7 = "CORTO PESADO";
                                    $prod8 = "DURO";
                                    $prod9 = "LARGO PESADO";
                                    $prod10 = "LATA";
                                    $prod11 = "LATON";
                                    $prod12 = "MARGINAL";
                                    $prod13 = "MIXTO";
                                    $prod14 = "MOTOR DE NEVERA";
                                    $prod15 = "PERFIL";
                                    $prod16 = "PLASTICO";
                                    $prod17 = "PLOMO CHATARRA";
                                    $prod18 = "PLOMO LINGOTE";
                                    $prod19 = "POTE";
                                    $prod20 = "RA";
                                    $prod21 = "RCA";
                                    $prod22 = "RL";
                                    $prod23 = "TARJETAS DE COMPUTADORA";
                                    $fecha = date('Y-m-d');
                                @endphp
                                @foreach ($registro as $reg)
                                    @if ($reg != null && $record->fecha == $fecha)
                                        <tr><th>{{$prod1 }}</th><th>{{$record->$prod1 }} kg</th><th>{{$reg->$prod1 }} kg</th></tr>
                                        <tr><th>{{$prod2 }}</th><th>{{$record->$prod2 }} kg</th><th>{{$reg->$prod2 }} kg</th></tr>
                                        <tr><th>{{$prod3 }}</th><th>{{$record->$prod3 }} kg</th><th>{{$reg->$prod3 }} kg</th></tr>
                                        <tr><th>{{$prod4 }}</th><th>{{$record->$prod4 }} kg</th><th>{{$reg->$prod4 }} kg</th></tr>
                                        <tr><th>{{$prod5 }}</th><th>{{$record->$prod5 }} kg</th><th>{{$reg->$prod5 }} kg</th></tr>
                                        <tr><th>{{$prod6 }}</th><th>{{$record->$prod6 }} kg</th><th>{{$reg->$prod6 }} kg</th></tr>
                                        <tr><th>{{$prod7 }}</th><th>{{$record->$prod7 }} kg</th><th>{{$reg->$prod7 }} kg</th></tr>
                                        <tr><th>{{$prod8 }}</th><th>{{$record->$prod8 }} kg</th><th>{{$reg->$prod8 }} kg</th></tr>
                                        <tr><th>{{$prod9 }}</th><th>{{$record->$prod9 }} kg</th><th>{{$reg->$prod9 }} kg</th></tr>
                                        <tr><th>{{$prod10}}</th><th>{{$record->$prod10}} kg</th><th>{{$reg->$prod10}} kg</th></tr>
                                        <tr><th>{{$prod11}}</th><th>{{$record->$prod11}} kg</th><th>{{$reg->$prod11}} kg</th></tr>
                                        <tr><th>{{$prod12}}</th><th>{{$record->$prod12}} kg</th><th>{{$reg->$prod12}} kg</th></tr>
                                        <tr><th>{{$prod13}}</th><th>{{$record->$prod13}} kg</th><th>{{$reg->$prod13}} kg</th></tr>
                                        <tr><th>{{$prod14}}</th><th>{{$record->$prod14}} kg</th><th>{{$reg->$prod14}} kg</th></tr>
                                        <tr><th>{{$prod15}}</th><th>{{$record->$prod15}} kg</th><th>{{$reg->$prod15}} kg</th></tr>
                                        <tr><th>{{$prod16}}</th><th>{{$record->$prod16}} kg</th><th>{{$reg->$prod16}} kg</th></tr>
                                        <tr><th>{{$prod17}}</th><th>{{$record->$prod17}} kg</th><th>{{$reg->$prod17}} kg</th></tr>
                                        <tr><th>{{$prod18}}</th><th>{{$record->$prod18}} kg</th><th>{{$reg->$prod18}} kg</th></tr>
                                        <tr><th>{{$prod19}}</th><th>{{$record->$prod19}} kg</th><th>{{$reg->$prod19}} kg</th></tr>
                                        <tr><th>{{$prod20}}</th><th>{{$record->$prod20}} kg</th><th>{{$reg->$prod20}} kg</th></tr>
                                        <tr><th>{{$prod21}}</th><th>{{$record->$prod21}} kg</th><th>{{$reg->$prod21}} kg</th></tr>
                                        <tr><th>{{$prod22}}</th><th>{{$record->$prod22}} kg</th><th>{{$reg->$prod22}} kg</th></tr>
                                        <tr><th>{{$prod23}}</th><th>{{$record->$prod23}} kg</th><th>{{$reg->$prod23}} kg</th></tr>
                                    @endif
                                @endforeach
                            @endif
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
        $("#almacen").DataTable({
            "responsive": true,
            "searching": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#almacen_wrapper .col-md-6:eq(0)');
        $("#inventario").DataTable({
            "responsive": true,
            "searching": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#inventario_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection