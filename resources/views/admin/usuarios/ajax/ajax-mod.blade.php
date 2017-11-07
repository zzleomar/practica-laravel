
<form action="/admin/usuarios/update/{{ $usuario->id }}" method="POST" accept-charset="utf-8">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
            <div class="form-group">
      <label>Nombre</label>
      <input type="text" name="name" class="form-control" placeholder="Nombre completo" value="{{ $usuario->name }}" required>
    </div>
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" value="{{ $usuario->username }}" required>
    </div>
    <div class="form-group">
      <label for="email">Correo</label>
      <input type="text" name="email" class="form-control" placeholder="example@gmail.com" value="{{ $usuario->email }}" required>
    </div>
    <div class="form-group">
      <label>Tipo</label>
      <select name="tipo" class="form-control">
        @if($usuario->tipo=='admin')
          <option value="admin">Adminidtración</option> 
        @else
          <option value="miembro">Miembro</option>  
        @endif
      </select>
    </div>
<div class="form-group">
            <input type="submit" Value="Guardar Cambios" class="btn btn-primary" id="btn-ajax-mod">
          </div>
        </form>