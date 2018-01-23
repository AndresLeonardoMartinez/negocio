@extends('layout.master')

@section ('contenido')
    <div class="container"> 

    <h1>Editar Producto </h1>
    <hr>
    <form method="POST" action="{{action('productoController@update', $id)}}"  enctype="multipart/form-data">
       <input name="_method" type="hidden" value="PATCH">

    	{{ csrf_field() }}
      <div class="form-group">
        <label for="name" >Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{$producto->name}}">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion" >{{$producto->descripcion}}</textarea>
      </div>
      <label for="Categoria">Categoria</label>
        @foreach($categoria as $cat)
            @if ($cat->id === $producto->categoria_id)
            <input class="radio-inline" checked type="radio" name="categoria_id" value='{{$cat->id}}'>{{$cat->name }}
            @else
            <input  class="radio-inline" type="radio" name="categoria_id" value='{{$cat->id}}'>{{$cat->name }}
            
            @endif
        @endforeach
        <br>
      
      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" step=0.01 min=0 name='precio' value="{{$producto->precio}}">
      </div>
      <div class="form-group">
        <label for="stock">stock</label>
        <input type="number" step=1 min=0 name='stock' value="{{$producto->stock}}">
      </div>
      <div class="form-group">
        <input  class="form-check-input" type="checkbox" name="nuevo"> Producto nuevo<br>
      </div>        
      <div class="row">
      	<div class="col-md-12 col-sm-12">            
				{{HTML::image($producto->imagen ,$producto->name,array('class' => 'imagenACambiar'))}}
	  	</div>
      	<div class="col-md-12 col-sm-12">            
      		<input type="file" class="form-control-file" id="imagen" name="imagen">
		    </div>      		
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
</div>
@endsection