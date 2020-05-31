<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','option','value'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
