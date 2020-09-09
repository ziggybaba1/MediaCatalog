<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')
            ->as('library')
            ->withPivot('loved');
    }
}
