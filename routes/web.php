<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('demo',function(){
	return view('admin.theloai.danhsach');
});

Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','loaitinController@getList')->name('loaitin');
		Route::post('add','loaitinController@addLoaiTin')->name('addLoaiTin');
		Route::post('edit','loaitinController@editLoaiTin')->name('editLoaiTin');
		Route::get('menu','loaitinController@changeMenu')->name('changeMenu');
		Route::get('gioithieu','loaitinController@changeGioiThieu')->name('changeGioiThieu');
    Route::post('del','loaitinController@delLoaiTin')->name('delLoaiTin');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','tintucController@getList')->name('tintuc');
		Route::get('themtin','tintucController@showAdd')->name('showAddTin');
		Route::post('add','tintucController@addTin')->name('addTin');
		Route::get('suatin/{id}','tintucController@showEdit')->name('showEditTin');
		Route::post('edit','tintucController@editTin')->name('editTin');
		Route::get('changeSlide','tintucController@changeSlide')->name('changeSlide');
		Route::get('changeThongBao','tintucController@changeThongBao')->name('changeThongBao');
    Route::post('del','tintucController@delTin')->name('delTin');
	});
  Route::group(['prefix'=>'khoa'],function(){
    Route::get('danhsach','khoaController@getList')->name('khoa');
    Route::post('add','khoaController@addKhoa')->name('addKhoa');
    Route::post('edit','khoaController@editKhoa')->name('editKhoa');
  });
  Route::group(['prefix'=>'lop'],function(){
    Route::get('danhsach','lopController@getList')->name('lop');
    Route::post('add','lopController@addLop')->name('addLop');
    Route::post('edit','lopController@editLop')->name('editLop');
    Route::get('change','lopController@changeLop')->name('changeLop');
  });
  Route::group(['prefix'=>'monhoc'],function(){
    Route::get('danhsach','monhocController@getList')->name('monhoc');
    Route::post('add','monhocController@addMonHoc')->name('addMon');
    Route::post('edit','monhocController@editMonHoc')->name('editMon');
  });
  Route::group(['prefix'=>'sinhvien'],function(){
    Route::get('danhsach/{id}','sinhvienController@getList')->name('sinhvien');
    Route::get('danhsach','sinhvienController@getDefault')->name('defaultList');
    Route::get('addSV','sinhvienController@showAdd')->name('showAddSV');
    Route::post('add','sinhvienController@addSV')->name('addSV');
    Route::get('editSV/{id}','sinhvienController@showEdit')->name('showEditSV');
    Route::post('edit','sinhvienController@editSV')->name('editSV');
    Route::post('changeGender','sinhvienController@changeGender')->name('changeGender');
    Route::get('diemcanhan/{id}','sinhvienController@getDiemCaNhan')->name('diemcanhan');
    Route::post('suadiem','sinhvienController@suaDiem')->name('suadiem');
  });
  Route::group(['prefix'=>'nguoidung'],function(){
    Route::get('danhsach','usersController@getList')->name('users');
    Route::post('add','usersController@addUser')->name('addUser');
    Route::post('edit','usersController@editUser')->name('editUser');
    Route::post('del','usersController@delUser')->name('delUser');
    Route::get('logout','usersController@logout')->name('logout');
  });
});
Route::get('menu','loaitinController@getMenu')->name('menu');
Route::get('trangchu','tintucController@getHome')->name('home');
Route::get('tintuc/{tieude}','tintucController@viewTin')->name('viewTin');
Route::get('loaitin/{tieude}','tintucController@listNews')->name('listNews');
Route::post('login','usersController@login')->name('login');
