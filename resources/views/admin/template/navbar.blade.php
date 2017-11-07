@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/usuarios">Listar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/usuarios/create">Crear</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Modificar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Buscar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Eliminar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/categorias">Listar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/categorias/create">Crear</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Modificar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Buscar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Eliminar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Articulos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/articulos">Listar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/articulos/create">Crear</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Modificar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Buscar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Eliminar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tags
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Crear</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Modificar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Buscar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Eliminar</a>
        </div>
      </li>
    </ul>
    @yiel('search')
    
  </div>
</nav>
@endsection