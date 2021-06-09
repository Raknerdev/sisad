@extends("theme.$theme.layout")
@section('titulo')
    Crear Factura Compra
@endsection
@section('contenido')
<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Factura de Compra</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Text</label>
              <input type="text" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Text Disabled</label>
              <input type="text" class="form-control" placeholder="Enter ..." disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>Textarea</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Textarea Disabled</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..." disabled></textarea>
            </div>
          </div>
        </div>

        <div class="card-footer align-items-center">
            <a href="factura_compra" type="submit" class="btn btn-info col-12">GENERAR FACTURA DE COMPRA</a>
        </div>
      </form>
    </div>
<div>   
@endsection
