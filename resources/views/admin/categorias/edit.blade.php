@extends('admin.template.main')

@section('titulo','Editar')

@section('contenido')
@include('admin.template.navbar')
<div class="container">
  <form action="/admin/categorias/update/{{ $categoria->id }}" method="POST" accept-charset="utf-8">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
    <div class="form-group">
      <label>Nombre</label>
      <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" value="{{ $categoria->nombre }}" required>
    </div>
    <div class="form-group">

      <input type="submit" Value="Editar" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection