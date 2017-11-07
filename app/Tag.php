<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table ="tags";

    protected $fillable = [
        'nombre'
    ];

    public function articulos(){
    	return $this->belongsToMany('App\articulo');
    	//si da error se le agg ->withTimestamps();
    }
    public function scopeBuscador($query, $nombre){
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
