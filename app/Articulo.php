<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table ="articulos";

    protected $fillable = [
        'titulo', 'contenido', 'categoria_id','user_id'
    ];

    public function categoria(){
    	return 	$this->belongsTo('App\categoria');//retorna la categoria
    }
    public function usuario(){
    	return $this->belongsTo('App\user');
    }
    public function imagenes(){
    	return $this->hasMany('App\imagen');
    }

    public function tags(){
    	return $this->belongsToMany('App\tag');
    }
}
