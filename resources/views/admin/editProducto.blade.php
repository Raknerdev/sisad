@extends("theme.$theme.layout")
@section('titulo')
    {{$producto->name}}
@endsection
@section('contenido')
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            {{--  Detalles  --}}
            <div class="col-md-6 mx-auto">
                <div class="card card-success card-outline shadow">
                    <div class="card-header">
                        <h3 class="text-center">
                            Actualizar {{$producto->codigo}} / {{$producto->name}} 
                        </h3>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('up_producto', ['id'=>encrypt("$producto->id")]) }}">
                        @csrf
                        <div class="card-body ">
                            <div class="form-group row mx-auto">
                                <label for="name" class="control-label col-sm-4 text-right mt-1 mr-3">Nombre</label>
                                <input type="text" class="form-control col-sm-7" name="name" placeholder="{{$producto->name}}" disabled>
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="mayorista" class="control-label col-sm-4 text-right mt-1 mr-3">Precio Mayorista</label>
                                <input type="number" class="form-control col-sm-7" name="mayorista" placeholder="{{$producto->Mayorista}}" min="0.01" step="0.01">
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="minorista" class="control-label col-sm-4 text-right mt-1 mr-3">Precio Minorista</label>
                                <input type="number" class="form-control col-sm-7" name="minorista" placeholder="{{$producto->Minorista}}" min="0.01" step="0.01">
                            </div>
                            <div class="form-group row mx-auto">
                                <label for="vip" class="control-label col-sm-4 text-right mt-1 mr-3">Precio VIP</label>
                                <input type="number" class="form-control col-sm-7" name="vip" placeholder="{{$producto->VIP}}" min="0.01" step="0.01">
                            </div>
                        </div>
                        <button type="submit" class="card-footer btn bg-gradient-success btn-block text-bold">
                            Actualizar
                        </button>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection