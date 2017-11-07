<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Usuario</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/personal.css')}}">
</head>
<body>
	<label>Nombre</label>{{$usuario->nombre}}<br>
	<label>Password</label>{{$usuario->password}}<br>
	<label>Correo</label>{{$usuario->email}}<br>

</body>
</html>