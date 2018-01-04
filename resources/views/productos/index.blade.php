@extends('layout.master')

@section ('js')        
  <script
  
  src={{ URL::to("js/producto/productos.js") }}></script>
@endsection

        
@section ('contenido')     
@include('layout.barraProductos')

<div class="album text-muted">
        <div class="container">
          <div class="row" id="r">
            

            
         
            
        </div>

      </div>  
</div>


@endsection
