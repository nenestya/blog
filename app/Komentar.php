<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = [
        'id','id_post','user','komentar'
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
