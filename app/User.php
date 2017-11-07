<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ="users";
    
    protected $fillable = [
        'name','username', 'email', 'password','tipo',
    ];

    public function articulos(){
        return $this->hasMany('App\articulo');
    }

    public function scopeBuscador($query, $name){
        return $query->where('name','LIKE',"%$name%");
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
