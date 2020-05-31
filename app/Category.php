<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'for', 'description', 'parent', 'thumbnail', 'banner'];

    public function posts(){
        return $this->belongsToMany('App\Post');
    }
    public function thumbnailImage(){
        return $this->belongsTo('App\Media', 'thumbnail');
    }
    public function bannerImage(){
        return $this->belongsTo('App\Media', 'banner');
    }
    public function parent() {
        return $this->belongsTo('App\Category', 'parent'); // get parent category
}

    public function children() {
        return $this->hasMany('App\Category', 'parent'); //get all subs. NOT RECURSIVE
    }
}
