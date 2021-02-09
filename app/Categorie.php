<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function post(){
        return $this->hasMany('App\Post','category_id');
    }
}