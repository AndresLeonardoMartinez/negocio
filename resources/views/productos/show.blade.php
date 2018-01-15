@extends('layout.master')




@section ('contenido')     

<div class="album text-muted">
        <div class="container">
          <div class="row" id="r">
				
			<div class="card">            
				{{HTML::image($producto->imagen ,$producto->name,array('class' => 'producto'))}}
				<h4 class="card-title" >{{$producto->name}} </h4>
				<p class="card-text"> {{$producto->descripcion}}</p>
				<h6 class="card-subtitle mb-2 text-muted">{{$producto->precio}} </h6>
				<p>Categoria: <a href={{'/categorias/'.$producto->categoria_id.'/get'}}>{{$producto->categoria->name}} </a>
				</p>
				@if ( auth()->user()->authorizeRoles('admin'))
 					<tr>
					  
        			<td>
             			<a href="{{action('productoController@edit', $producto['id'])}}" class="btn btn-warning">Editar</a>
             			
            			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
  						Eliminar
						</button>
 
	          		</td>
          		</tr>
          		<tr>
          			<td>
          				<a href="{{action('productoController@create')}}" class="btn btn-success">Nuevo Producto</a>
          			</td>
          		</tr>
			</div>

        </div>

      </div>  
</div>
				
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">CONFIRMAR OPERACIÓN</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        ¿Realmente desea eliminar el producto <b>{{$producto->name}}?</b>
			      </div>
			      <div class="modal-footer">
          			<form action="{{action('productoController@destroy', $producto['id'])}}" method="post">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            		{{csrf_field()}}
            			<input name="_method" type="hidden" value="DELETE">
			        <button type="submit" class="btn btn-primary">Confirmar</button>
          			</form>
			      </div>
			    </div>
			  </div>
			</div>

		@endif


@endsection
