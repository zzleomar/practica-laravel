@extends('admin.template.main')

@section('titulo','Usuario Nuevo')

@section('contenido')
@include('admin.template.navbar')
	@if(count($errors)>0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
<div class="container">
	<form action="/admin/categorias" method="POST" accept-charset="utf-8">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required>
		</div>
		<div class="form-group">

			<input type="submit" Value="Guardar" class="btn btn-primary">
		</div>
	</form>
</div>
@endsection