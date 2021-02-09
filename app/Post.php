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
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tags_id');
    }

}
