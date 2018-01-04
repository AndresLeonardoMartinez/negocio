@extends('layout.master')

@section ('contenido')
    <div class="container"> 

    <h1>Creación de una categoria </h1>
    <hr>
    <form method="POST" action="/categorias"  enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name" >Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
      </div>
      <input type="file" class="form-control-file" id="imagen" name="imagen">
      <br>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection