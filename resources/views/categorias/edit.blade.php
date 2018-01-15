@extends('layout.master')

@section ('contenido')
    <div class="container"> 

    <h1>Edicioón de una Categoria </h1>
    <hr>
    

      <form method="POST" action="{{action('categoriaController@update', $id)}}"  enctype="multipart/form-data">
       <input name="_method" type="hidden" value="PATCH">

      {{ csrf_field() }}

      <div class="form-group">
        <label for="name" >Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value ="{{$categoria->name}}">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion">{{$categoria->descripcion}}</textarea>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12">            
        {{HTML::image($categoria->imagen ,$categoria->name,array('class' => 'imagenACambiar'))}}
      </div>
        <div class="col-md-12 col-sm-12">            
          <input type="file" class="form-control-file" id="imagen" name="imagen">
        </div>          
      </div>
     
      <br>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection