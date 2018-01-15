@extends('layout.master')

@section ('js')        
  <script
  src={{ URL::to('js/producto/modal.js') }}></script>
  
@endsection


@section ('contenido')     
@include('categorias.modalEliminar')

<center>
	<i><h3>Administración de Categorias</h3></i>
</center>

<div class="album text-muted">
        <div class="container">
          <table class="table table-bordered table-striped table-hover category-table" data-toggle="dataTable" data-form="deleteForm">
          	<tbody>
			@if ($categorias->isEmpty())
				<h2>No hay elementos</h2>
				<a href="{{action('categoriaController@create')}}" class="btn btn-success">Agregar Categoria</a>
			@endif
			@foreach($categorias as $categoria)
			<tr>
		      <td>    
				{{HTML::image($categoria->imagen ,$categoria->name,array('class' => 'productoAdmin'))}}
			</td>
			<td>
				<h4 class="card-title" >{{$categoria->name}} </h4>
			
				<p class="card-text"> {{$categoria->descripcion}}</p>
			
				</td>
			
			
					  
        			<td>
             			<a href="{{action('categoriaController@edit', $categoria['id'])}}" class="btn btn-warning">Editar</a>
             			
             		
             		
             			{!! Form::model($categoria, ['method' => 'delete', 'action' => ['categoriaController@destroy', $categoria->id], 'class' =>'form-inline form-delete']) !!}
                    	{!! Form::hidden('id', $categoria->id) !!}
                    	{!! Form::submit('Eliminar', ['class' => 'btn btn-danger delete', 'name' => 'delete_modal']) !!}
                    	{!! Form::close() !!}
            			
 
	          		
          		
          			
          				<a href="{{action('categoriaController@create')}}" class="btn btn-success">Nueva Categoria</a>
          			</td>
          		</tr>
			
			@endforeach
		</tbody>
		</table>
        </div>

</div>
				
			

@endsection
