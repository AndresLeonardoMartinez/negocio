

@extends('layout.master')

@section ('js')        
  <script
  src="js/categorias.js"></script>
@endsection
@section ('contenido')     
<div class="album text-muted">
        <div class="container">
          <div class="row">
          @foreach($categorias as $categoria)
            <div class="card">

              <h4 class="card-title">{{$categoria->name}}</h4>
              <h6 class="card-subtitle mb-2 text-muted"><a href={{'http://localhost/categorias/'.$categoria->id}}>{{$categoria->name}}</a></h6>
              <p class="card-text">{{$categoria->descripcion}}</p>
        

            
            </div>
            
        @endforeach        
          </div>

      </div>  
</div>


@endsection
