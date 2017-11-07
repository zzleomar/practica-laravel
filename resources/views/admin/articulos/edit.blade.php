@extends('admin.template.main')

@section('titulo','Editar')

@section('contenido')
@include('admin.template.navbar')
<div class="container">
  <form action="/admin/articulos/update{{ $articulo->id }}" method="POST" accept-charset="utf-8">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
    <div class="form-group">
      <label>Titulo</label>
      <input type="text" name="titulo" class="form-control" placeholder="titulo completo" value="{{ $articulo->titulo }}" required>
    </div>
    <div class="form-group">
      <label for="email">Contenido</label>
      <textarea class="form-control">{{ $articulo->contenido }}</textarea>
    </div>
    <div class="form-group">

      <input type="submit" Value="Editar" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection