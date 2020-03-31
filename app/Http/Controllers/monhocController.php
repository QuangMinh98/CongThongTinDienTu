<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\monhoc;

class monhocController extends Controller
{
    public function getList(Request $request){
        if(isset($request->search)){
            $monhoc = monhoc::search($request->search);
        }
        else{
            $monhoc = monhoc::getList();
        }
        return view('admin.monhoc.list',['monhoc'=>$monhoc]);
    }

    public function addMonHoc(Request $request){
        $monhoc = monhoc::create($request->all());
        monhoc::createDiem($monhoc->id);
        return redirect()->route('monhoc');
    }

    public function editMonHoc(Request $request){
        $monhoc = monhoc::find($request->id)->update($request->all());
        return redirect()->route('monhoc');
    }
}
