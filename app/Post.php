<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title'];

    public function categorie(){
        return $this->belongsTo('App\Categorie','category_id');
    }

    public function postInfo(){
        return $this->hasOne('App\PostInformation','post_id','id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function postUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
