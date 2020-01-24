<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    //
    /**
     * テーブルの主キー
     *
     * @var string
     * 必要ない可能性？
     */
    protected $primaryKey = 'category_id';

    protected $fillable = ['name'];

    
    
    public function commands(){
        return $this->hasMany('App\Command');
    }

    public function getCommandList(){
            $commands = Command::where('category_id', $this->category_id)
            ->orderBy('id', 'desc')
            // ->take(10)
            ->get();

            return $commands;



    }
}
