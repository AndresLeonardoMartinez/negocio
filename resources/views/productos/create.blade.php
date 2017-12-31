@extends('layout.master')

@section ('contenido')
    <div class="container"> 

    <h1>Creación de un producto </h1>
    <hr>
    <form method="POST" action="/productos"  enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name" >Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
      </div>
      <label for="Categoria">Categoria</label>
        @foreach($categoria as $cat)
            <input type="radio" name="categoria_id" value='{{$cat->id}}'>{{$cat->name}}
            
        @endforeach
        <br>
      <label for="precio">Precio</label>
      <input type="number" step=0.01 min=0 name='precio' >
      <input type="file" class="form-control-file" id="imagen" name="imagen">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection