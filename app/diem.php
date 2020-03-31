<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diem extends Model
{
    protected $table = 'diem';
    protected $fillable = ['idSV','idMonHoc','chuyencan','thuongxuyen','giuaky','cuoiky'];

    public static function diemcanhan($id){
      return diem::join('monhoc','monhoc.id','diem.idMonHoc')
            ->where('diem.idSV',$id)
            ->select('diem.id','diem.chuyencan','diem.thuongxuyen','diem.giuaky','diem.cuoiky','monhoc.tenmonhoc')
            ->get();
    }
}
