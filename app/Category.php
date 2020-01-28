<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    
    
    public function commands()
    {
        return $this->hasMany('App\Command');
    }

    public function getCommandList()
    {
        $commands = Command::where('category_id', $this->category_id)
            ->orderBy('id', 'desc')
            // ->take(10)
            ->get();

        return $commands;
    }

    public function checkCommandList()
    {
        // $command = Command::where('category_id', '=', Input::get('category_id'))->first();
        // $command = Command::where('category_id', '=', Input::get('category_id'))->first();
        $command_exists = DB::table('commands')->where('category_id', $this->category_id)->exists();


        if ($command_exists) {
            return true;
        } else {
            return false;
        }
        // return $command;
    }
}
