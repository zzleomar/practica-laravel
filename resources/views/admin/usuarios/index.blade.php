@extends('admin.template.main')

@section('titulo','Lista de Usuarios')

@section('contenido')
	@section('search')
		<form class="form-inline my-2 my-lg-0" method="GET" action="/admin/usuarios" >
	      <input class="form-control mr-sm-2" type="search" placeholder="Nombre del Usuario" aria-label="Search" name="name">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    </form>
	@endsection
<?php
	if(isset($_GET['page'])){
  		$page=$_GET['page']; 
		if($page>$usuarios->lastPage() or $page<1){
			$page=1;
			//return view('admin.usuarios.index',['usuarios' => $usuarios]);
			//return view('admin.usuarios.index')->with('usuarios', $usuarios);
			//return back();
			//return redirect('/admin/usuarios');
			echo "<script type=\"text/javascript\">  location.href=\"../admin/usuarios\";</script>";
		}
	}
	else{
		$page=1;
	}

?>

	<table class="table table-striped">
		<thead style="text-align: center;">
			<th class="align-self-center">ID</th>
			<th class="align-self-center">Nombre</th>
			<th class="align-self-center">Username</th>
			<th class="align-self-center">Correo</th>
			<th class="align-self-center">Tipo</th>
			<th class="align-self-center">Acción</th>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario )
				
				<tr>
					<td class="align-self-center">{{ $usuario->id }}</td>
					<td class="align-self-center">{{ $usuario->name }}</td>
					<td class="align-self-center">{{ $usuario->username }}</td>
					<td class="align-self-center">{{ $usuario->email }}</td>
					<td class="align-self-center">
					@if($usuario->tipo=='admin')
						<span class="p-1 mb-2 bg-danger text-white rounded border border-dark d-flex justify-content-center">{{ $usuario->tipo }}</span>
					@else
						<span class="p-1 mb-2 bg-primary text-white rounded border border-dark d-flex justify-content-center">{{ $usuario->tipo }}</span>
						
					@endif
					</td>
					<td class="align-self-center">

<!--
						<a href="/admin/usuarios/edit/<?php echo $usuario->id; ?>" class="btn btn-outline-warning">Modificar</a>
						<a onclick="return confirm('¿Seguro que desea eliminarlo?')" href="/admin/usuarios/destroy/<?php echo $usuario->id; ?>" class="btn btn-outline-danger">Eliminar</a>
-->
						<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#eliminar-usuario" id="btn-eliminar-usuario" data-id="{{ $usuario->id }}">Eliminar</button>
						<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modificar-usuario" id="btn-modificar-usuario" data-id="{{ $usuario->id }}">Modificar</button>
					</td>
				</tr>

			@endforeach
		</tbody>

	</table>
	<nav aria-label="...">
		  <ul class="pagination">
		  	@if($page==1)
			    <li class="page-item disabled">
			      <span class="page-link">Previous</span>
			    </li>
		    @else
			    <li class="page-item">
			      <a class="page-link" href="/admin/usuarios?page=<?php   $aux=$page-1; echo $aux;?>">Previous</a>
			    </li>
		    @endif

		    @for($i=1; $i<=$usuarios->lastPage(); $i++)
			    @if($page==$i)
			    	<li class="page-item active">
				      <span class="page-link">
				        {{ $i }}
				        <span class="sr-only">(current)</span>
				      </span>
				    </li>
				@else
			    	<li class="page-item"><a class="page-link" href="/admin/usuarios?page={{ $i }}">{{ $i }}</a></li>
			    @endif
		    @endfor
		    @if($page==$usuarios->lastPage())
			    <li class="page-item disabled">
			      <span class="page-link">Next</span>
			    </li>
		    @else
			    <li class="page-item">
			      <a class="page-link" href="/admin/usuarios?page=<?php  $aux=$page+1; echo $aux; ?>">Next</a>
			    </li>
		    @endif
		  </ul>
	</nav>
	@include('template.modal-usuario')
	@section('ajax')
		<script type="text/javascript">

			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')
				}
			});
		$(document).on('click','#btn-modificar-usuario',function(e){
			var id= $(this).data('id');
			var url="{{ URL::to('admin/usuarios/edit-ajax') }}/"+id;
			$.get(url,function(data){	
				$('#ajax-mod-usuario').empty().html(data);
			});
		});
		$(document).on('click','#btn-eliminar-usuario',function(e){
			var id= $(this).data('id');
			var url="{{ URL::to('admin/usuarios/destroy-ajax') }}/"+id;
			$.get(url,function(data){	
				$('#ajax-eli-usuario').empty().html(data);
			});
		});
		</script>
	@endsection
@endsection

