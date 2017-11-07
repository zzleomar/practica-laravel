<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulo;
use App\categoria;
use App\tag;
use App\user;
use Auth;
use Szykra\Notifications\Flash;
use App\imagen;

class ControladorArticulos extends Controller
{
    public function index()
    {
        $articulos=articulo::orderBy('id','ASC')->paginate(5);
        $articulos->each(function($articulos){
            $articulos->categoria();
            $articulos->usuario();
            $articulos->imagenes();
            $articulos->tags();
        });

    	return view('admin.articulos.index')->with('articulos', $articulos);
    }
    public function store(Request $request)
    {
        if($request->file('imagen')){
            $file= $request->file('imagen');
            $name='imagen_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/images/articulos/';
            $file->move($path,$name);
        }

        $articulo=new articulo($request->all());
        $articulo->user_id=Auth::user()->id;
        $articulo->save();
        $articulo->tags()->sync($request->tags);

        $imagen= new imagen();
        $imagen->nombre=$name;
        $imagen->articulo()->associate($articulo);
        $imagen->save();

    	 
            flash::success('La articulo '.$articulo->titulo.' se ha registrado de forma Exitosa.');
            return redirect('/admin');
        
    }
    public function create()
    {
        $categorias=categoria::orderBy('id','ASC')->get();
        $tags=tag::orderBy('id','ASC')->get();
        return view('admin.articulos.create')->with('categorias',$categorias)->with('tags',$tags );
    }
    public function show($id){

    }
    public function update(Request $request, $id){
        $articulo= articulo::find($id);
        $articulo->titulo=$request->titulo;
        $articulo->contenido=$request->contenido;
        $articulo->save();
        flash::info('La articulo '.$articulo->titulo.' ha sido modificado');

        return redirect('admin/articulos');
    }
    public function edit($id){
        $articulo=articulo::find($id);
        return view('admin.articulos.edit',['articulo' => $articulo]);
    }
    public function destroy($id){
        $articulo= articulo::find($id);

        $articulo->delete();

        flash::error('El articulo '.$articulo->titulo.' ha sido borrado exitosamente');
        return redirect('admin/articulos');
    }
}
