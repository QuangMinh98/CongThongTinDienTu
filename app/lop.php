<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    protected $table = 'lop';
    protected $fillable = ['tenlop','idKhoa'];

    public static function getList(){
        return lop::all();
    }

    public static function getListAndKhoa(){
      return lop::join('khoa','khoa.id','lop.idKhoa')
            ->orderBy('khoa.tenkhoa')
            ->select('lop.id','lop.tenlop','khoa.tenkhoa','lop.idKhoa')->get();
    }

    public static function getListByKhoa($idKhoa){
      return lop::join('khoa','khoa.id','lop.idKhoa')
            ->where('lop.idKhoa',$idKhoa)
            ->orderBy('khoa.tenkhoa')
            ->select('lop.id','lop.tenlop','khoa.tenkhoa','lop.idKhoa')->get();
    }
}
