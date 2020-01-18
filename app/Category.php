<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    
    public function commands(){
        return $this->hasMany('App\Command');
    }
}
