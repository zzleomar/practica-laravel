<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\RequestTag;
use Szykra\Notifications\Flash;
use App\Tag;


class ControladorTags extends Controller
{
	public function index(Request $request)
    {
    	$tags=tag::Buscador($request->nombre)->orderBy('id','ASC')->paginate(3);
        return view('admin.tags.index')->with('tags', $tags);
    }
    public function store(RequestTag $request)
    {
    	$new = new tag($request->all());
        $new->save();
        flash::success('Tag '.$new->nombre.' se ha registrado de forma Exitosa.');
        return redirect('/admin');
    }
    public function create()
    {
        $tag= array (['nombre' =>'']);
        $new= new tag($tag);
        return view('admin.tags.create')->with('res', $new);
    }
    public function update(Request $request, $id){
        $tag= tag::find($id);
        $auxnombre=$tag->nombre;
        $tag->nombre=$request->nombre;
        $tag->save();
        flash::success('El tag '.$auxnombre.' se modifico ha '.$tag->nombre.' exitosamente');
        return redirect('admin/tags');
    }
    public function edit($id){
        $tag=tag::find($id);
        return view('admin.tags.edit',['tag' => $tag]);
    }
    public function destroy($id){
        $tag= tag::find($id);
        $tag->delete();

        flash::success('El tag '.$tag->nombre.' ha sido borrado exitosamente');
        return redirect('admin/tags');
    }
    
}
