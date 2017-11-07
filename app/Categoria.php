<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     
    protected $table ="categorias";

    protected $fillable = [
        'nombre'
    ]; 
    public function articulos(){
    	return $this->hasMany('App\articulo');
    }
    public function scopeBuscador($query, $nombre){
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
