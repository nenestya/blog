<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id','post'
    ];
    public function komentar(){
        return $this->hasMany('App\Komentar');
    }
}
