
<!doctype html>
<html lang="en">
  <head>
    
  </head>

  <body>

      <div>   
        @foreach($categorias as $categoria)
            <h2>{{$categoria->name}}</h2>
            <h3>{{$categoria->precio}}</h3>
            <p>{{$categoria->descripcion}}</p>
        @endforeach
     </div>
  </body>
</html>
