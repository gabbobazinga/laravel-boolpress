<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInformation extends Model
{
    protected $table = 'posts_information';

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
