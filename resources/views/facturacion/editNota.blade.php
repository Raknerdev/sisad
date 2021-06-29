@extends("theme.$theme.layout")
@section('titulo')
    Seguimiento 
@endsection
@section('styles')
<script language="JavaScript">
    function aggProd() {
        var p = document.querySelector(".produ");
        var p_prime = p.cloneNode(true);
        document.getElementById('productos').appendChild(p_prime);
    }
</script>
@endsection
@section('contenido')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            {{--  Detalles  --}}
            <div class="col-md-6">
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">
                                Nota de Entrega / {{$nota->ctrl_factura}}
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Codigo Cliente</th>
                                    <td>{{$nota->cod_cliente}}</td>
                                </tr>
                                <tr>
                                    <th>Cliente</th>
                                    <td>{{$nota->nombre_c}}</td>
                                </tr>
                                <tr>
                                    <th>Cédula:</th>
                                    <td>{{$nota->cedula_c}}</td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td>{{$nota->direccion_c}}</td>
                                </tr>
                                <tr>
                                    <th>Teléfono</th>
                                    <td>{{$nota->telefono}}</td>
                                </tr>
                                <tr>
                                    <th>Tipo</th>
                                    <td>{{$nota->cliente}}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de Creación</th>
                                    <td>{{$nota->fecha_emision}}</td>
                                </tr>
                                <tr>
                                    <th>Observación</th>
                                    <td>{{$nota->observacion}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('v_nota', ['id'=>encrypt("$nota->id")]) }}" class="card-footer btn bg-gradient-lightblue text-bold">Vista de Impresión</a>
                </div>
            </div>
            {{--  Seguimientos  --}}
            <div class="col-md-6">
                <div class="card card-warning card-outline shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">
                                Nuevo Seguimiento de Nota / {{$nota->ctrl_factura}}
                            </h3>
                        </div>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('up_nota', ['id'=>encrypt("$nota->id")]) }}">
                        @csrf
                        <div class="card-body ">
                            <div class="form-group row mx-auto">
                                <label for="estado" class="col-sm-4 text-right mt-1 mr-3 control-label">Estado </label>
                                <select class="form-control col-sm-7" name="estado">
                                    <option selected disabled>Select...</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Completada">Completada</option>
                                    <option value="Anulada">Anular</option>
                                </select>
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="fecha" class="control-label col-sm-4 text-right mt-1 mr-3">Fecha</label>
                                <input class="form-control col-sm-7" name="fecha" type="date" min="{{$nota->fecha_pago}}" min="<?php echo date("Y-m-d");?>" required>
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="f_pago" class="control-label col-sm-4 text-right mt-1 mr-3">Forma de Pago </label>
                                <select class="form-control col-sm-7" name="f_pago">
                                    <option selected disabled>Select...</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="referencia" class="control-label col-sm-4 text-right mt-1 mr-3">Referencia</label>
                                <input type="text" class="form-control col-sm-7" name="referencia" placeholder="0217284" pattern="[0-9]{1,30}">
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="abono" class="control-label col-sm-4 text-right mt-1 mr-3">Abono</label>
                                <input type="number" class="form-control col-sm-7" name="abono" placeholder="10.00" min="1" max="{{$nota->resta}}" step="0.1">
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="obs" class="control-label col-sm-4 text-right mt-1 mr-3">Observación</label>
                                <input type="text" class="form-control col-sm-7" name="obs" placeholder="Comentario." pattern="[A-Z a-z.0-9]">
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-primary col-12" onclick="aggProd();" value="+ Agregar otro Producto" />
                            </div>
                            <div class="form-group" id="productos">
                                <div class="produ mb-3 text-left">
                                    <div class="row">
                                        <div id="product" class="col-sm-6">
                                            <label for="producto" class="control-label">Producto</label>
                                            <select class="form-control" name="producto[]" id="producto">
                                            </select>
                                        </div>
                                        <div id="pes" class="col-sm-6">
                                            <label for="peso" class="control-label">peso</label>
                                            <div class="">
                                                <input class="form-control" type="number" name="peso[]" id="peso" placeholder="15.3" min="1" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="form-group row mx-auto">
                                <label for="debe" class="control-label col-sm-4 text-right mt-1 mr-3">Debe</label>
                                <input type="text" class="form-control col-sm-7" name="debe" placeholder="00.00">
                            </div>  --}}
                        </div>
                        {{--  <i class="fa fa-btn fa-user"></i>  --}}
                        @if ($nota->estado == 'Anulada')
                        <button disabled type="submit" class="card-footer btn bg-gradient-danger btn-block text-bold">
                            Factura Anulada
                        </button>
                        @elseif ($nota->estado == 'Completada')
                        <button disabled type="submit" class="card-footer btn bg-gradient-warning btn-block text-bold text-black-50">
                            Factura Cerrada
                        </button>
                        @else
                        <button type="submit" class="card-footer btn bg-gradient-warning btn-block text-bold text-white-50">
                            Actualizar
                        </button>                        
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="text-center table table-bordered table-striped mt-5 mb-5 shadow">
        <thead>
            <tr>
                <th colspan="9" class=" bg-gradient-success">Seguimientos de la Factura / {{$nota->ctrl_factura}}</th>
            </tr>
            <tr>
                <th>Item</th>
                <th>Total a Pagar</th>
                <th>Fecha</th>
                <th>Forma de Pago</th>
                <th>Ref.</th>
                <th>Abona</th>
                <th>Debe</th>
                <th>Deuda pendiente</th>
                <th>Resta</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 0;
            @endphp
            @foreach ($seguimientos as $seguimiento)
            @if ($seguimiento->id_factura == $nota->id)
            <tr>
                <td>{{$cont=$cont+1}}</td>
                <td>{{round($seguimiento->total)}}$</td>
                <td>{{$seguimiento->fecha_pago}}</td>
                <td>
                    @if ($seguimiento->forma_pago == null)
                        N/P
                    @else
                    {{$seguimiento->forma_pago}}
                    @endif
                </td>
                <td>{{$seguimiento->ref}}</td>
                <td>
                    @if ($seguimiento->abono != null)
                        {{round($seguimiento->abono)}}$
                    @else
                        0$
                    @endif
                    
                </td>
                <td>
                    @if ($seguimiento->debe != null)
                        {{round($seguimiento->debe)}}$
                    @else
                        0$
                    @endif
                </td>
                <td>
                    @if ($seguimiento->descuento > 0)
                        {{round($seguimiento->descuento + $seguimiento->debe)}}$
                    @else
                        0$
                    @endif
                </td>
                <td>{{round($seguimiento->resta)}}$</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
    <script>
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
</script>
@endsection