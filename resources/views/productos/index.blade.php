@extends('layout.master')

@section ('js')        
  <script
  src="js/productos.js"></script>
@endsection
        
@section ('contenido')     
<div class="album text-muted">
        <div class="container">
          <div class="row">
          @foreach($productos as $producto)
            

            <div class="card">
            <h4 class="card-title">{{$producto->name}}</h4>
            <p class="card-text">{{$producto->descripcion}}</p>
            <h6 class="card-subtitle mb-2 text-muted">${{$producto->precio}}</h6>
            
            <p>Categoria:<a href={{'http://localhost/categorias/'.$producto->categoria_id}}> {{$producto->categoria->name}}</a></p>
<!--               <img data-src="holder.js/100px280?theme=thumb" alt="Card image cap">
 -->              
            </div>
            
        @endforeach        
          </div>

      </div>  
</div>


@endsection
