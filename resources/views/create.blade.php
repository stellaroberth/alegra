@extends('principal')

@section('title', 'Create')

@section('contenido')
<section class="content">
<!--<div class="col-md-9">-->
    	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Artículo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            @if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
            <form name="formulario" id="formulario" class="form-horizontal" enctype="multipart/form-data" method="POST" action=""><!--enctype para que se guarde la imagen jpg-->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" placeholder="nombre">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Descripción</label>
                  <div class="col-sm-10">
                    <input type="text" name="description" id="description" class="form-control" placeholder="descripcion">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Referencia</label>
                  <div class="col-sm-10">
                    <input type="text" name="reference" id="reference" class="form-control" placeholder="referencia">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Precio</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" id="price" class="form-control" placeholder="precio">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-danger">Cancelar</button>
                <a href="{{url('/')}}"><button type="button" class="btn btn-success">Regresar</button></a>
                <button type="submit" class="btn btn-info pull-right">Guardar</button>
              </div>
              <!-- /.box-footer -->
            </form>
<!--          </div>-->
</div>
</section>

@push('scripts')
<script>
    $('#formulario').on('submit',function(e){
      e.preventDefault();
      var url='https://app.alegra.com/api/v1/items';
      var name=document.getElementById("name").value;
      var description=document.getElementById("description").value;
      var reference=document.getElementById("reference").value;
      var price=document.getElementById("price").value;
    $.ajax({
      headers:{
        'Authorization':'Basic '+ btoa('roberth.stella@gmail.com:2a0bf0809344bd02e99d')
      },
      url: url,
      dataType: 'json',
      type: 'POST',
      contentType: 'application/json',
      data:JSON.stringify ({"name": name,"description": description,"reference": reference,"price": price,"customFields":[]}),
      success:function(data){
        alert("Articulo Incluido")
        location.href="{{ url('/')}}"
      },
      error:function(jqXhr,textStatus,errorThrown){
        alert(errorThrown);  
      }
    });      
})    
</script>
@endpush
@stop

