@extends('layout.master')

@section ('js')        
  <script
  src={{ URL::to("js/producto/productosPorCategoria.js") }}></script>
  
@endsection
        
@section ('contenido')     
<div class="container">
	<center>
		<h1>{{$categoria->name}}</h1>
		<i><h5>{{$categoria->descripcion}}</h5></i>
		<h1 class="hidden" id="categoria_id">{{$categoria->id}}</h1>
	</center>
</div>
@include('layout.barraProductos')

<div class="album text-muted">
        <div class="container">
          <div class="row" id="r">
            

            
         
            
        </div>

      </div>  
</div>


@endsection
