<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\RequestCategoria;
use App\categoria;
use Szykra\Notifications\Flash;

class ControladorCategorias extends Controller
{
    public function index(Request $request)
    {
        $categorias=categoria::Buscador($request->nombre)->orderBy('id','ASC')->paginate(3);
    	return view('admin.categorias.index')->with('categorias', $categorias);
    }
    public function store(RequestCategoria $request)
    {
    	$new = new categoria($request->all());
        $new->save();
         flash::success('La categoria '.$new->nombre.' se ha registrado de forma Exitosa.');
        return redirect('/admin');
    }
    public function create()
    {
    	return view('admin.categorias.create');
    }
    public function show($id){

    }
    public function update(Request $request, $id){
        $categoria= categoria::find($id);
        $auxc=$categoria->nombre;
        $categoria->nombre=$request->nombre;
        $categoria->save();
        flash::info('La categoria '.$auxc.' ha sido modificado ha '.$categoria->nombre);

        return redirect('admin/categorias');
    }
    public function edit($id){
        $categoria=categoria::find($id);
        return view('admin.categorias.edit',['categoria' => $categoria]);
    }
    public function destroy($id){
        $categoria= categoria::find($id);

        $categoria->delete();

        flash::error('El categoria '.$categoria->nombre.' ha sido borrado exitosamente');
        return redirect('admin/categorias');
    }
}
