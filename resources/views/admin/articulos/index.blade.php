@extends('admin.template.main')

@section('titulo','Lista de articulos')

@section('contenido')
	@section('search')
		<form class="form-inline my-2 my-lg-0" method="GET" action="/admin/categorias">
	      <input class="form-control mr-sm-2" type="search" placeholder="Nombre de la categoria" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    </form>
	@endsection

<?php
	if(isset($_GET['page'])){
  		$page=$_GET['page']; 
		if($page>$articulos->lastPage() or $page<1){
			$page=1;
			echo "<script type=\"text/javascript\">  location.href=\"../admin/articulos\";</script>";
		}
	}
	else{
		$page=1;
	}

?>

	<table class="table table-striped">
		<thead style="text-align: center;">
			<th class="align-self-center">ID</th>
			<th class="align-self-center">Titulo</th>
			<th class="align-self-center">Contenido</th>
			<th class="align-self-center">Categoria</th>
			<th class="align-self-center">Acción</th>
		</thead>
		<tbody>
			@foreach($articulos as $articulo )
				<?php  ?>
				<tr>
					<td>{{ $articulo->id }}</td>
					<td>{{ $articulo->titulo }}</td>
					<td>{{ $articulo->contenido }}</td>
					<td>{{ $articulo->categoria->nombre }}</td>
					<td style="text-align: center;"><a href="/admin/articulos/edit/<?php echo $articulo->id; ?>" class="btn btn-outline-warning">Modificar</a> <a onclick="return confirm('¿Seguro que desea eliminarlo?')" href="/admin/articulos/destroy/<?php echo $articulo->id; ?>" class="btn btn-outline-danger">Eliminar</a></td>
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
			      <a class="page-link" href="/admin/articulos?page=<?php   $aux=$page-1; echo $aux;?>">Previous</a>
			    </li>
		    @endif

		    @for($i=1; $i<=$articulos->lastPage(); $i++)
			    @if($page==$i)
			    	<li class="page-item active">
				      <span class="page-link">
				        {{ $i }}
				        <span class="sr-only">(current)</span>
				      </span>
				    </li>
				@else
			    	<li class="page-item"><a class="page-link" href="/admin/articulos?page={{ $i }}">{{ $i }}</a></li>
			    @endif
		    @endfor
		    @if($page==$articulos->lastPage())
			    <li class="page-item disabled">
			      <span class="page-link">Next</span>
			    </li>
		    @else
			    <li class="page-item">
			      <a class="page-link" href="/admin/articulos?page=<?php  $aux=$page+1; echo $aux; ?>">Next</a>
			    </li>
		    @endif
		  </ul>
	</nav>
@endsection

