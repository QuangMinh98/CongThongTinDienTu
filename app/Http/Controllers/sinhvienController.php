<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\diem;

class sinhvienController extends Controller
{
    public function getList($id){
          $class = lop::findOrFail($id);
          $khoa = khoa::getList();
          $sv = sinhvien::getSVbyClass($id);
          $lop = lop::getListByKhoa($class->idKhoa);
        return view('admin.sinhvien.list',['sv'=>$sv,'khoa'=>$khoa,'lop'=>$lop,'class'=>$class]);
    }

    public function getDefault(){
        $khoa = khoa::getList();
        if($khoa->count()>0){
            $lop = lop::getListByKhoa($khoa[0]->id);
            if(isset($lop)){
              $sv = sinhvien::getSVbyClass($lop[0]->id);
              $class = $lop[0];
            }
            else{
              $sv = sinhvien::getList();
              $class = lop::getList();
            }
        }
        else{
          $lop = lop::getList();
          $sv = sinhvien::getList();
          $class = lop::getList();
        }
      return view('admin.sinhvien.list',['sv'=>$sv,'khoa'=>$khoa,'lop'=>$lop,'class'=>$class]);
    }

    public function showAdd(){
        $khoa = khoa::getList();
        $lop = lop::getListByKhoa($khoa[0]->id);
        return view('admin.sinhvien.add',['khoa'=>$khoa,'lop'=>$lop]);
    }

    public function addSV(Request $request){
        $sv = sinhvien::create($request->all());
        sinhvien::createDiem($sv->id);
        return redirect()->route('defaultList');
    }

    public function editSV(Request $request){
        $sv = sinhvien::find($request->id)->update($request->all());
        return redirect()->route('sinhvien');
    }

    public function showEdit($id){
        $sv = sinhvien::getOne($id);
        $khoa = khoa::getList();
        $lop = lop::getListByKhoa($sv->idKhoa);
        return view('admin.sinhvien.edit',['khoa'=>$khoa,'lop'=>$lop,'sv'=>$sv]);
    }

    public function changeGender(Request $request){
        $sv = sinhvien::changeGender($request->id,$request->gender);
    }

    public function getDiemCaNhan($id){
        $sv = sinhvien::find($id);
        $diem = diem::diemcanhan($id);
        return view('admin.sinhvien.diem',['sv'=>$sv,'diem'=>$diem]);
    }

    public function suaDiem(Request $request){
        $diem = diem::find($request->id)->update($request->all());
        return redirect()->route('diemcanhan',['id'=>$request->idSV]);
    }
}
