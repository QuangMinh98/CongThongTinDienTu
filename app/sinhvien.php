<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\monhoc;
use App\diem;

class sinhvien extends Model
{
    protected $table = 'sinhvien';
    protected $fillable = ['masv','hosv','tensv','ngaysinh','gioitinh','diachi','quequan','idLop'];

    public static function getList(){
        return sinhvien::join('lop','lop.id','sinhvien.idLop')
              ->orderBy('sinhvien.tensv')
              ->select('sinhvien.id','sinhvien.masv','sinhvien.hosv','sinhvien.tensv','sinhvien.ngaysinh','sinhvien.diachi','sinhvien.gioitinh','sinhvien.quequan','lop.tenlop')->get();
    }

    public static function getSVbyClass($id){
        return sinhvien::join('lop','lop.id','sinhvien.idLop')
              ->where('sinhvien.idLop',$id)
              ->orderBy('sinhvien.tensv')
              ->select('sinhvien.id','sinhvien.masv','sinhvien.hosv','sinhvien.tensv','sinhvien.ngaysinh','sinhvien.diachi','sinhvien.gioitinh','sinhvien.quequan','lop.tenlop')->get();
    }

    public static function getOne($id){
        return sinhvien::join('lop','lop.id','sinhvien.idlop')
              ->join('khoa','lop.idKhoa','khoa.id')
              ->where('sinhvien.id',$id)
              ->select('sinhvien.id','sinhvien.masv','sinhvien.hosv','sinhvien.tensv','sinhvien.ngaysinh','sinhvien.diachi','sinhvien.gioitinh','sinhvien.quequan','lop.id as idLop','khoa.id as idKhoa')->firstOrFail();
    }

    public static function createDiem($id){
        $monhoc = monhoc::all();
        foreach($monhoc as $list){
          $diem = diem::create(['idMonHoc'=>$list->id,'idSV'=>$id]);
        }
    }

    public static function changeGender($id,$gender){
        return sinhvien::find($id)->update(['gioitinh'=>$gender]);
    }
}
