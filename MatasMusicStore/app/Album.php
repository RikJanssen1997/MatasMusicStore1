<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function artist(){
        return $this->belongsTo('App\Artist');
    }

    public function songs(){
        return $this->hasMany(Song::class);
     }
     public function users(){
        return $this->belongsToMany('App\User','user_albums', 'album_id', 'user_id');
    }
}
