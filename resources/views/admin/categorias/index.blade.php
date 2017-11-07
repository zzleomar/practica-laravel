@extends('admin.template.main')

@section('titulo','Lista de categorias')

@section('contenido')
	@section('search')
		<form class="form-inline my-2 my-lg-0" method="GET" action="/admin/categorias">
	      <input class="form-control mr-sm-2" type="search" placeholder="Nombre de la categoria" aria-label="Search" name="nombre">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    </form>
	@endsection

<?php
	if(isset($_GET['page'])){
  		$page=$_GET['page']; 
		if($page>$categorias->lastPage() or $page<1){
			$page=1;
			//return view('admin.categorias.index',['categorias' => $categorias]);
			//return view('admin.categorias.index')->with('categorias', $categorias);
			//return back();
			//return redirect('/admin/categorias');
			echo "<script type=\"text/javascript\">  location.href=\"../admin/categorias\";</script>";
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
			<th class="align-self-center">Acción</th>
		</thead>
		<tbody>
			@foreach($categorias as $categoia )
				
				<tr>
					<td class="align-self-center">{{ $categoia->id }}</td>
					<td class="align-self-center">{{ $categoia->nombre }}</td>
					<td class="align-self-center"><a href="/admin/categorias/edit/<?php echo $categoia->id; ?>" class="btn btn-outline-warning">Modificar</a> <a onclick="return confirm('¿Seguro que desea eliminarlo?')" href="/admin/categorias/destroy/<?php echo $categoia->id; ?>" class="btn btn-outline-danger">Eliminar</a></td>
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
			      <a class="page-link" href="/admin/categorias?page=<?php   $aux=$page-1; echo $aux;?>">Previous</a>
			    </li>
		    @endif

		    @for($i=1; $i<=$categorias->lastPage(); $i++)
			    @if($page==$i)
			    	<li class="page-item active">
				      <span class="page-link">
				        {{ $i }}
				        <span class="sr-only">(current)</span>
				      </span>
				    </li>
				@else
			    	<li class="page-item"><a class="page-link" href="/admin/categorias?page={{ $i }}">{{ $i }}</a></li>
			    @endif
		    @endfor
		    @if($page==$categorias->lastPage())
			    <li class="page-item disabled">
			      <span class="page-link">Next</span>
			    </li>
		    @else
			    <li class="page-item">
			      <a class="page-link" href="/admin/categorias?page=<?php  $aux=$page+1; echo $aux; ?>">Next</a>
			    </li>
		    @endif
		  </ul>
	</nav>
@endsection

