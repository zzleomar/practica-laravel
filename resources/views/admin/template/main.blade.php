@guest
       
@else

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('titulo','default')| Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('plugins/jquery/jquery-3.2.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/popper/dist/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</head>
<body>

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
	          <a class="dropdown-item" href="/admin/tags">Listar</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="/admin/tags/create">Crear</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Modificar</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Buscar</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Eliminar</a>
	        </div>
	      </li>
	    </ul>

	    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
					<ul style="display: inline-block; margin-top: 10px;">
	  					  @yield('search')
					</ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
	    
	  </div>

	</nav>

	@include('notifications::flash')
	<section class="container col-md-8" style="float: none;">
	@yield('contenido') 
	</section>
	
</body>
@yield('ajax')
</html>
@endguest
