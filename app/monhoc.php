<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\sinhvien;
use App\diem;

class monhoc extends Model
{
    protected $table = 'monhoc';
    protected $fillable = ['mamonhoc','tenmonhoc','sotinchi'];

    public static function getList(){
        return monhoc::all();
    }

    public static function createDiem($id){
        $sv = sinhvien::all();
        foreach ($sv as $list) {
          $diem = diem::create(['idMonHoc'=>$id,'idSV'=>$list->id]);
        }
    }

    public static function search($str){
        return monhoc::where('tenmonhoc','like','%'.$str.'%')->get();
    }
}
