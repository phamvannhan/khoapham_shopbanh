<?php
//route dang ki 
Route::get('dangki',['as'=>'getRegister','uses'=>'UserController@getRegister']);
Route::post('dangki',['as'=>'postRegister','uses'=>'UserController@postRegister']);

//route dang nhap = sql , đã import dc lỗi vì csdl là full_name,

Route::get('dangnhap',['as'=>'getLogin','uses'=>'UserController@getLogin']);
Route::post('dangnhap',['as'=>'postLogin','uses'=>'UserController@postLogin']);
//route đang xuất của người dùng

Route::get('dangxuat',['as'=>'getLogout','uses'=>'UserController@getLogout']);
//chức năng tìm kiếm
Route::get('search',['as'=>'search','uses'=>'PageController@getSearch']);



Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
	//dùng bảo mật middleware, mún vào route dưới thì phải đăng nhập
		Route::get('lien-he',[
			'as'=>'lienhe',
			'uses'=>'PageController@getLienHe'
			]);
		Route::get('gioi-thieu',[
			'as'=>'gioithieu',
			'uses'=>'PageController@getGioiThieu'
			]);
		

});
//-------------route giao dien nguoi dung
	Route::get('trangchu',[
		'as'=>'trangchu',
		'uses'=>'PageController@getIndex'
		]);

	//Route::get('loai-san-pham','PageController@getLoaisp');
	//chú ý lỗi truyền biến ko có sử dụng $ trong route
	Route::get('loai-san-pham/{type}',[
		'as'=>'loaisanpham',
		'uses'=>'PageController@getLoaisp'
		]);
	Route::get('chi-tiet-san-pham/{id}',[
		'as'=>'chitiet_sanpham',
		'uses'=>'PageController@getChiTiet'
		]);
Route::get('cart',[
		'as'=>'giohang',
		'uses'=>'CartController@viewCart'
		]);
	Route::get('cart/addCart/{id}',[
		'as'=>'themgiohang',
		'uses'=>'CartController@addItem'
		]);
	/*Route::get('cart/updateCart/{id}',[
		'as'=>'capnhatgio',
		'uses'=>'CartController@updateCart'
		]);
	*/
Route::get('cap-nhat/{id}/{qty}',[
		'as'=>'capnhatgio',
		'uses'=>'CartController@update'
		]);
	
	Route::get('cart/removeCart/{id}',[
		'as'=>'xoagiohang',
		'uses'=>'CartController@removeItem'
		]);
		
	//Route::resource('/cart', 'CartController');
	Route::get('checkout',[
		'as'=>'dathang',
		'uses'=>'PageController@ChecKout'
		]);