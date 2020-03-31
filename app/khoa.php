<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    protected $table = 'khoa';
    protected $fillable = ['tenkhoa','nienkhoa'];

    public static function getList(){
        return khoa::all();
    }
}
