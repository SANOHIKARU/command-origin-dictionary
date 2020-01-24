<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Command extends Model
{
    //

     



    protected $fillable = ['category_id', 'name', 'origin', 'description'];


    public function category()
    {
        return $this->belongsTo('App\Category');

    }
}
