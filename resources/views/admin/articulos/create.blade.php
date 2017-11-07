@extends('admin.template.main')

@section('titulo','Articulo Nuevo')

@section('contenido')
@include('admin.template.navbar')
<div class="container">
	<form action="/admin/articulos" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
		<div class="form-group">
			<label>Titulo</label>
			<input type="text" name="titulo" class="form-control" placeholder="titulo completo" required>
		</div>
		<div class="form-group">
			<label>Categoria</label>
			<select class="form-control" name="categoria_id" placeholder="Selecciones la categoria" style="height: 40px;">
				@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="email">Contenido</label>
			<textarea name="contenido"  class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label class="control-label">Tags</label><hr>
			@foreach($tags as $tag)
				<div class="ext-div"><label class="control-label ext-label">{{ $tag->nombre }}</label><input type="checkbox" class="form-control ext-input" name="tags[]" value="{{ $tag->id }}"></div>
			@endforeach
		</div><hr>
		<div class="form-group">
			<label>Imagen</label>
			<input type="file" name="imagen" class="form-control" style="height: auto;">
		</div>
		<div class="form-group">

			<input type="submit" Value="Guardar" class="btn btn-primary">
		</div>
	</form>
</div>
@endsection