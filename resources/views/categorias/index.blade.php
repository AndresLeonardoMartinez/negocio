
<!doctype html>
<html lang="en">
  <head>
    
  </head>

  <body>

      <div>   
        @foreach($categorias as $categoria)
            
            <a href={{'http://localhost/categorias/'.$categoria->id}}><h2>{{$categoria->name}}</h2></a>
            <h3>{{$categoria->precio}}</h3>
            <p>{{$categoria->descripcion}}</p>
        @endforeach
     </div>
  </body>
</html>
