<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'content', 'excerpt', 'status', 'parent', 'type', 'publish_at'];
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
