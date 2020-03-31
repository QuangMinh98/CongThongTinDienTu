<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lop;
use App\khoa;

class lopController extends Controller
{
    public function getList(Request $request){
        if(isset($request->khoa)){
          $lop = lop::getListByKhoa($request->khoa);
        }
        else {
          $lop = lop::getListAndKhoa();
        }
        $khoa = khoa::getList();
        return view('admin.lop.list',['lop'=>$lop,'khoa'=>$khoa,'sort'=>$request->khoa]);
    }

    public function addLop(Request $request){
        $lop = lop::create($request->all());
        return redirect()->route('lop')->with('thongbao','Đã thêm thành công');
    }

    public function editLop(Request $request){
        $lop = lop::find($request->id)->update($request->all());
        return redirect()->route('lop')->with('thongbao','Đã chỉnh sửa thành công');
    }

    public function changeLop(Request $request){
        $lop = lop::getListByKhoa($request->id);
        return view('admin.lop.change',['lop'=>$lop]);
    }

}
