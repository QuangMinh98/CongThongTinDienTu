<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class usersController extends Controller
{
    public function getList(){
      $users = User::getList();
      return view('admin.user.list',['users'=>$users]);
    }

    public function addUser(Request $request){
      $this->validate($request,[
    		'name'=>'required|min:3',
    		'email'=>'required|email|unique:users,email',
    		'password'=>'required|min:3|max:22'
    	],[
    		'name.required'=>'Bạn Chưa Nhập Tên Người Dùng',
    		'name.min'=>'Tên Cần Tối Thiểu 3 Ký Tự',
    		'email.required'=>'Bạn Chưa Nhập Email',
    		'email.email'=>'Bạn Phải Nhập Vào Email',
    		'email.unique'=>'Email Đã Tồn Tại',
    		'password.required'=>'Bạn Chưa Nhập Mật Khẩu',
    		'password.min'=>'Mật Khẩu Cần Tối Thiểu 3 Ký Tự',
    		'password.max'=>'Mật Khẩu Tối Đa 22 Ký Tự'
    	]);
    	$user = new User;
    	$user->name = $request->name;
    	$user->password = bcrypt($request->password);
    	$user->email = $request->email;
      $user->level = 0;
    	$user->save();
      return redirect()->route('users')->with('Đã thêm thành công');
    }

    public function editUser(Request $request){
      $this->validate($request,[
    		'name'=>'required|min:3'
    	],[
    		'name.required'=>'Bạn Chưa Nhập Tên Người Dùng',
    		'name.min'=>'Tên Cần Tối Thiểu 3 Ký Tự'
    	]);
    	$user = User::find($request->id);
    	$user->name = $request->name;
    	$user->save();
      return redirect()->route('users')->with('Đã sửa thành công');
    }

    public function delUser(Request $request){
      $user = User::find($id);
      $user->delete();
      return redirect()->route('users')->with('thongbao','Đã xóa thành công');
    }

    public function login(Request $request){
      $this->validate($request,[
        'email' =>'required|email',
        'password' => 'required|min:6'
        ],[
            'email.required' => 'Bạn phải nhập vào email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Bạn phải nhập vào mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ]);
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->route('loaitin');
        }else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('home');
    }
}
