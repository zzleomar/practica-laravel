<?php

namespace App\Http\Controllers;
use App\http\Requests\RequestUsuario;
use App\user;
use Szykra\Notifications\Flash;

use Illuminate\Http\Request;

class ControladorUsuarios extends Controller
{
	public function index(Request $request)
    {
    	$usuarios=User::Buscador($request->name)->orderBy('id','ASC')->paginate(3);
        return view('admin.usuarios.index')->with('usuarios', $usuarios);
    }
    public function store(RequestUsuario $request)
    {
    	$new = new user($request->all());
        if($new->password!=$request->password_confirmation){
             flash::error(' El password no coinside');
            return view('admin.usuarios.create')->with('res', $new);
        }
        else{
            $new->password=bcrypt($request->password);
            $new->save();
             flash::success($new->name.' se ha registrado de forma Exitosa.');
            return redirect('/admin');
        }
    }
    public function create()
    {
        $usuario= array (['name' =>'','username' =>'','email' =>'']);
        $new= new user($usuario);
        return view('admin.usuarios.create')->with('res', $new);
    }
    public function show($id){

    }
    public function update(Request $request, $id){
        $usuario= user::find($id);
        $usuario->name=$request->name;
        $usuario->username=$request->username;
        $usuario->email=$request->email;
        $usuario->tipo=$request->tipo;
        $usuario->save();
        flash::success('El usuario '.$usuario->username.' ha sido modificado exitosamente');
        return redirect('admin/usuarios');
    }
    public function edit($id){
        $usuario=user::find($id);
        return view('admin.usuarios.edit',['usuario' => $usuario]);
    }
    public function editAjax($id){
        $usuario=user::find($id);
        return view('admin.usuarios.ajax.ajax-mod',['usuario' => $usuario]);
    }
    public function destroyAjax($id){
        $usuario=user::find($id);
        return view('admin.usuarios.ajax.ajax-eli',['usuario' => $usuario]);
    }
    public function destroy($id){
        $usuario= user::find($id);
        $usuario->delete();

        flash::success('El usuario '.$usuario->username.' ha sido borrado exitosamente');
        return redirect('admin/usuarios');
    }   
}
