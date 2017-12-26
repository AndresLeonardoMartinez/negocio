
<!doctype html>
<html lang="en">
  <head>
    
  </head>

  <body>

      <div>   
        @foreach($productos as $producto)
            <h2>{{$producto->name}}</h2>
            <h3>{{$producto->precio}}</h3>
            <p>{{$producto->descripcion}}</p>
        @endforeach
     </div>
  </body>
</html>

