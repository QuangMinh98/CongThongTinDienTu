<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khoa;

class khoaController extends Controller
{
    public function getList(){
        $khoa = khoa::getList();
        return view('admin.khoa.list',['khoa'=>$khoa]);
    }

    public function addKhoa(Request $request){
        $khoa = khoa::create($request->all());
        return redirect()->route('khoa')->with('thongbao','Đã thêm thành công');
    }

    public function editKhoa(Request $request){
        $khoa = khoa::find($request->id)->update($request->all());
        return redirect()->route('khoa')->with('thongbao','Đã thêm thành công');
    }

}
