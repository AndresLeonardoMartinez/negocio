
<!doctype html>
<html lang="en">
  <head>
    
  </head>

  <body>
      <h1>{{$categoria->name}}</h1>
      <h5>{{$categoria->descripcion}}</h5>
      <hr>
       <div>   
        @foreach($categoria->productos as $producto)
            <h2>{{$producto->name}}</h2>
            <h3>{{$producto->precio}}</h3>
            <p>{{$producto->descripcion}}</p>
        @endforeach
     </div>
  </body>
</html>