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
	<form action="/admin/usuarios" method="POST" accept-charset="utf-8">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
		<div class="form-group">
			<label  class="">Nombre</label>
            
				<input type="text" name="name" class="form-control" placeholder="Nombre completo" value="{{ $res->name }}" required>
			</div>
		
		<div class="form-group">
            <label for="username" class="">Username</label>
            
                <input id="username" type="text" class="form-control" name="username" value="{{ $res->username }}" placeholder="Ejp. Nombre006" required autofocus>
        </div>
		<div class="form-group">
			<label for="email" class="">Correo</label>
            
				<input type="text" name="email" class="form-control" placeholder="example@gmail.com" value="{{ $res->email }}" required> 
			</div>
		
		<div class="form-group">
			<label class="">Tipo</label>
            
				<select name="tipo">
					<option>Seleccione un nivel</option>
					<option value="admin">Adminidtración</option>	<option value="miembro">Miembro</option>	
				</select>
		</div>
		<div class="form-group">
			<label for="password" class="">Password</label>
			<input type="password" name="password" class="form-control" placeholder="*********" required>
		</div>
        <div class="form-group">
            <label for="password-confirm" class="">Confirmación de Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
		
		<div class="form-group">

			<input type="submit" Value="Guardar" class="btn btn-primary">
		</div>
	</form>
</div>
@endsection