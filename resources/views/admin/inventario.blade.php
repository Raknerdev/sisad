@extends("theme.$theme.layout")
@section('titulo')
    Almacen
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
                <h4 class="modal-title text-center ml-4">Agregar Producto</h4>
            </div>
            <div class="modal-body text-center">
                <form class="form-horizontal" role="form" method="POST" action="{{url('agregar_producto')}}" enctype="multipart/form-data"  id="form-nuevo">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="nombre" class="control-label col-sm-6">Nombre de producto</label>
                        <div class="col-6">
                            <input class="form-control" id="nombre" type="text" name="nombre" placeholder="MIXTO" pattern="[A-Z a-z]{1,20}" style="text-transform:uppercase;" required>
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
                    <h3  class="d-inline">Almacen <?php echo date("d-m-Y");?></h3>
                    <button class="d-inline btn btn-info shadow float-right" id="btn-creacion" 
                    data-toggle="modal" data-target="#creacion" name="Agregar Producto">
                        Salida de Producto
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="productos" class="table table-bordered table-striped">
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
                                    @if ($reg->fecha == $fecha && $record != null)
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
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#productos_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection