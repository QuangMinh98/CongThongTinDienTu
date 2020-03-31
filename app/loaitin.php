<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tintuc;

class loaitin extends Model
{
    protected $table = 'loaitin';

    public function tintuc(){
    	return $this->hasMany('App\tintuc','idLoaiTin','id')->orderBy('created_at','desc');
    }

    public static function search($str){
      return loaitin::where('tenloaitin','like','%'.$str.'%')->get();
    }

    public static function Del($id){
        tintuc::where('idLoaiTin',$id)->delete();
        $loaitin =loaitin::find($id);
        $loaitin->delete();
    }
}
