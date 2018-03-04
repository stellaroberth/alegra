@extends('principal')

@section('title', 'AppWeb Articulo')

@section('contenido')
      <section class="content">
      	<div class="row">
      	<h3 align="center">Lista de Artículos de Alegra</h3>      		
      	</div>
      	<div class="row">
      		<div class="col-md-8">
	      		<a href="{{url('create')}}"><button type="button" class="btn btn-default">Nuevo</button></a>
	      	</div>
	    </div>
	    <div class="row">  	
	   		<div class="col-md-12">

	   		<table class="table table-striped table table-bordered table table-hover"> 
		   		<thead>
		   		 <tr> 
			   		 <th>Id</th> 
			   		 <th>Nombre</th>
			   		 <th>Descripción</th>
			   		 <th>Categoria</th>
			   		 <th>Referencia</th>
			   		 <th>Precio COP</th>
			   		 <th>Opciones</th> 
		   		 </tr> 
		   		 </thead> 
		   		 <tbody> 
		   		 @foreach($posts as $p)
			   	<tr> 
					<td>{{$p->id}}</td> 
					<td>{{$p->name}}</td>
					<td>{{$p->description}}</td> 
					<td>{{$p->category->name}}</td> 
					<td>{{$p->reference}}</td> 
					<td>{{$p->price[0]->price}}</td>
					<td>
						<a href="{{ URL::action('ArticuloController@edit',$p->id)}}"><button type="button" class="btn btn-info glyphicon glyphicon-pencil"></button></a>
						<a href="{{ URL::action('ArticuloController@delete',$p->id)}}"><button type="button" class="btn btn-danger glyphicon glyphicon-remove "></button></a>
					</td> 
			   	</tr> 
		   		 </tbody>
		   		 @endforeach
		   		  @if ($paso===1)
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Articulo Eliminado</strong>
					</div>
				@else		
				@endif	
	   		 </table>
	   		</div>
   		</div>
  </section>
@stop

