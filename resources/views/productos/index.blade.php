@extends('layout.master')

@section ('js')        
  <script
  
  src={{ URL::to("js/producto/productos.js") }}></script>
  <script
  src={{ URL::to("js/producto/compartido.js") }}></script>
@endsection

        
@section ('contenido')     
<div class="container">
	<center>
		<h1 class="tituloEncabezado"> Listado Productos</h1>
	</center>
</div>
@include('layout.barraProductos')
<div class="container">
	<div class="row" id="r">
    

    
 
    
	</div>
</div>


@endsection
