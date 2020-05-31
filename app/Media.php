<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'url', 'type'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
