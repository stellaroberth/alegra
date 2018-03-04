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
                  <input type="hidden" name="id" value="{{$posts->id}}" id="id">
                  <label class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" " value="{{$posts->name}}" id="inputEmail3" placeholder="nombre">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Descripción</label>
                  <div class="col-sm-10">
                    <input type="text" name="description"  id="description" value="{{ $posts->description }}" class="form-control"   id="inputEmail3" placeholder="descripcion">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Referencia</label>
                  <div class="col-sm-10">
                    <input type="text" name="reference" id="reference" value="{{$posts->reference}}" class="form-control"  id="inputEmail3" placeholder="referencia">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Precio</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" id="price" class="form-control" value="{{$posts->price[0]->price}}" id="inputEmail3" placeholder="precio">
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
      var id=document.getElementById("id").value;
      var name=document.getElementById("name").value;
      var description=document.getElementById("description").value;
      var reference=document.getElementById("reference").value;
      var price=document.getElementById("price").value;
      var url='https://app.alegra.com/api/v1/items/'+id;
    $.ajax({
      headers:{
        'Authorization':'Basic '+ btoa('roberth.stella@gmail.com:2a0bf0809344bd02e99d')
      },
      url: url,
      dataType: 'json',
      type: 'PUT',
      contentType: 'application/json',
      data:JSON.stringify ({'name' : name,'description':description, 'reference':reference, 'price':price,'status' : 'active','customFields': []}),
      success:function(data){
        alert("Articulo Modificado")
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

