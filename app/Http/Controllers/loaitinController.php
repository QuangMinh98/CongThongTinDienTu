<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use App\tintuc;

class loaitinController extends Controller
{
    public function getList(){
    	$loaitin = loaitin::all();
    	return view('admin.loaitin.list',['loaitin'=>$loaitin]);
    }

    public function addLoaiTin(Request $request){
    	$this->validate($request,[
    		'tenloaitin' => 'required|min:5|max:255'
    	],[
    		'tenloaitin.required' => 'Bạn chưa nhập tên loại tin',
    		'tenloaitin.min' => 'Tên loại tin có tối thiểu 5 ký tự',
    		'tenloaitin.max' => 'Tên loại tin có tối đa 255 ký tự'
    	]);
    	$loaitin = new loaitin;
    	$loaitin->tenloaitin = $request->tenloaitin;
    	$loaitin->tenkhongdau = convert_vi_to_en($request->tenloaitin);
    	$loaitin->menu = 0;
    	$loaitin->gioithieu = 0;
    	$loaitin->save();
    	return redirect()->route('loaitin')->with('thongbao','Đã thêm thành công.');
    }

    public function changeMenu(Request $request){
    	$loaitin = loaitin::find($request->id);
    	$loaitin->menu = $request->menu;
    	$loaitin->save();
    }

    public function changeGioiThieu(Request $request){
    	$loaitin = loaitin::find($request->id);
    	$loaitin->gioithieu = $request->gioithieu;
    	$loaitin->save();	
    }

    public function editLoaiTin(Request $request){
    	$loaitin = loaitin::find($request->id);
    	$loaitin->tenloaitin = $request->tenloaitin;
    	$loaitin->tenkhongdau = convert_vi_to_en($request->tenloaitin);
    	$loaitin->save();
    	return redirect()->route('loaitin')->with('thongbao','Đã cập nhật thành công.');
    }

    public function getMenu(){
    	$menu = loaitin::where('menu','1')->get();
    	$gioithieu = loaitin::where('gioithieu','1')->firstOrFail();
    	$menuGioiThieu = tintuc::where('idLoaiTin',$gioithieu->id)->get();
    	return view('master.navigation',['menu'=>$menu,'gioithieu'=>$menuGioiThieu]);
    }
}
