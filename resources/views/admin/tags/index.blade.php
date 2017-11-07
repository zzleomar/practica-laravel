@extends('admin.template.main')

@section('titulo','Lista de Tags')

@section('contenido')
@include('admin.template.navbar')

<?php
	if(isset($_GET['page'])){
  		$page=$_GET['page']; 
		if($page>$tags->lastPage() or $page<1){
			$page=1;
			//return view('admin.tags.index',['tags' => $tags]);
			//return view('admin.tags.index')->with('tags', $tags);
			//return back();
			//return redirect('/admin/tags');
			echo "<script type=\"text/javascript\">  location.href=\"../admin/tags\";</script>";
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
			@foreach($tags as $tag )
				
				<tr>
					<td>{{ $tag->id }}</td>
					<td>{{ $tag->nombre }}</td>
					<td style="text-align: center;"><a href="/admin/tags/edit/<?php echo $tag->id; ?>" class="btn btn-outline-warning">Modificar</a> <a onclick="return confirm('¿Seguro que desea eliminarlo?')" href="/admin/tags/destroy/<?php echo $tag->id; ?>" class="btn btn-outline-danger">Eliminar</a></td>
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
			      <a class="page-link" href="/admin/tags?page=<?php   $aux=$page-1; echo $aux;?>">Previous</a>
			    </li>
		    @endif

		    @for($i=1; $i<=$tags->lastPage(); $i++)
			    @if($page==$i)
			    	<li class="page-item active">
				      <span class="page-link">
				        {{ $i }}
				        <span class="sr-only">(current)</span>
				      </span>
				    </li>
				@else
			    	<li class="page-item"><a class="page-link" href="/admin/tags?page={{ $i }}">{{ $i }}</a></li>
			    @endif
		    @endfor
		    @if($page==$tags->lastPage())
			    <li class="page-item disabled">
			      <span class="page-link">Next</span>
			    </li>
		    @else
			    <li class="page-item">
			      <a class="page-link" href="/admin/tags?page=<?php  $aux=$page+1; echo $aux; ?>">Next</a>
			    </li>
		    @endif
		  </ul>
	</nav>
@endsection

