@extends('layout.master')

@section ('js')        
  <script
  src={{ URL::to('js/producto/modal.js') }}></script>
  
@endsection


@section ('contenido')     
@include('productos.modalEliminar')

<center>
	<i><h3>Administración de productos</h3></i>
</center>

<div class="album text-muted">
        <div class="container">
          <table class="table table-bordered table-striped table-hover category-table" data-toggle="dataTable" data-form="deleteForm">
          	<tbody>
          	@if ($productos->isEmpty())
				<h2>No hay elementos</h2>
				<a href="{{action('productoController@create')}}" class="btn btn-success">Agregar Producto</a>
			@endif
			@foreach($productos as $producto)
			<tr>
		      <td>    
				{{HTML::image($producto->imagen ,$producto->name,array('class' => 'productoAdmin'))}}
			</td>
			<td>
				<h3 >{{$producto->name}} </h3>
			
				<p class="text-justify"> {{$producto->descripcion}}</p>
			
				<h4 > $ {{$producto->precio}} </h4>
		
				
				<p>Categoria: <a href={{'/categorias/'.$producto->categoria_id.'/get'}}>{{$producto->categoria->name}} </a>
				</p>
				@if($producto->stock==0)
					<h6 class="noDisponible"> No disponible</h6>
				@else
					<h6 >stock : {{$producto->stock}} </h6>
				@endif
				@if($producto->nuevo || $producto->esNuevo())
					<h4 class="nuevo">Producto nuevo!</h4>
				@endif
				</td>
			
			
					  
        			<td>
             			<a href="{{action('productoController@edit', $producto['id'])}}" class="btn btn-warning">Editar</a>
             			
             		
             		
             			{!! Form::model($producto, ['method' => 'delete', 'action' => ['productoController@destroy', $producto->id], 'class' =>'form-inline form-delete']) !!}
                    	{!! Form::hidden('id', $producto->id) !!}
                    	{!! Form::submit('Eliminar', ['class' => 'btn btn-danger delete', 'name' => 'delete_modal']) !!}
                    	{!! Form::close() !!}
            			
 
	          		
          		
          			
          				<a href="{{action('productoController@create')}}" class="btn btn-success">Nuevo Producto</a>
          			</td>
          		</tr>
			
			@endforeach
		</tbody>
		</table>
        </div>

</div>
				
			

@endsection
