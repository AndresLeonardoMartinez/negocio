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
				<h4 class="card-title" >{{$producto->name}} </h4>
			
				<p class="card-text"> {{$producto->descripcion}}</p>
			
				<h6 class="card-subtitle mb-2 text-muted">{{$producto->precio}} </h6>
		
				
				<p>Categoria: <a href={{'/categorias/'.$producto->categoria_id.'/get'}}>{{$producto->categoria->name}} </a>
				</p>
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
