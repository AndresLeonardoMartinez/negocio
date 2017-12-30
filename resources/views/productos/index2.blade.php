@extends('layout.master')

@section ('js')        
  <script
  src="js/producto/productos.js"></script>
@endsection
        
@section ('contenido')     
<div class="container"> 
  <ul class="nav">
    <li class="nav-item">
      <button type="button" class="btn btn-primary" id="OrdenarMenor">Ordenar por precio m</button>
    </li>
    <li class="nav-item">
      <button type="button" class="btn btn-primary" id="OrdenarMayor">Ordenar por precio M</button>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</div>

<div class="album text-muted">
        <div class="container">
          <div class="row" id="r">
            

            
         
            </div>
            
          </div>

      </div>  
</div>


@endsection
