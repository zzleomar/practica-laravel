<?php

namespace App\Http\Controllers;
use Auth;


use Illuminate\Http\Request;

class ControladorSesion extends Controller
{
    public function index(){
    	if(Auth::user()){
	    	if(Auth::user()->tipo=='admin'){
	    		return view('admin.index');
	    	}
	    	else{
	    		//Auth::logout(); //para cerrar sesión
	    		return redirect('/home');
	    	}
    	}
	    return redirect('/login');

    }
}
