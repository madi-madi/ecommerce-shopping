<?php

Route::group(['prefix'=> 'admin', 'namespace'=>'Admin'], function(){
	Config::set('auth.defines', 'admin');
Route::get('login','AdminAuthController@login')->name('login');
Route::post('login','AdminAuthController@dologin');
Route::get('forgot/password', 'AdminAuthController@forgot_password');
Route::post('forgot/password', 'AdminAuthController@forgot_password_post');
Route::get('reset/password/{token}' , 'AdminAuthController@reset_password');
Route::post('reset/password/{token}' , 'AdminAuthController@reset_password_final');
Route::group(['middleware'=> 'admin:admin'], function(){


	Route::get('/', function(){
		return view('admin.home');
	});

	// User Controller 
	Route::get('users','AdminUsersController@index')->name('users');
	// delete user 
	Route::delete('user/{id}/delete','AdminUsersController@deleteUser')->middleware('delete:SuperAdmin,Admin');
	// Route::post('user/{id}/restore','AdminUsersController@restoreUser')->middleware('
	// 	update');
	Route::post('user/{id}/restore',['middleware'=>'update:SuperAdmin,Admin','as'=>'restore.user','uses'=>'AdminUsersController@restoreUser']);
	Route::delete('user/{id}/deleteforever',['middleware'=>'delete:SuperAdmin,Admin','as'=>'deleteforever.user','uses'=>'AdminUsersController@deleteforeverUser']);
	Route::patch('user/{id}/update',['middleware'=>'update:SuperAdmin,Admin','as'=>'update.user','uses'=>'AdminUsersController@updateUser']);

// Admins
	Route::get('admins','AdminsController@index')->name('admins');
	// delete admin 
	Route::delete('admin/{id}/delete',['middleware'=>'delete:SuperAdmin,Admin','as'=>'delete.admin','uses'=>'AdminsController@deleteAdmin']);

	Route::post('admin/{id}/restore',['middleware'=>'update:SuperAdmin,Admin','as'=>'restore.admin','uses'=>'AdminsController@restoreAdmin']);
	Route::delete('admin/{id}/deleteforever',['middleware'=>'delete:SuperAdmin,Admin','as'=>'deleteforever.admin','uses'=>'AdminsController@deleteforeverAdmin']);
	Route::patch('admin/{id}/update',['middleware'=>'update:SuperAdmin,Admin','as'=>'update.admin','uses'=>'AdminsController@updateAdmin']);

	//  AdmimProductsController
	Route::get('products','AdmimProductsController@index')->name('products');
	// category
	Route::get('categories','AdmimProductsController@getCategories')->name('categories');
    // products/create
    Route::post('products/create','AdmimProductsController@createProduct')->name('create_product');

	Route::delete('image/{id}/delete',['middleware'=>'delete:SuperAdmin,Admin','as'=>'delete.image','uses'=>'AdmimProductsController@deleteImage']);


	// notification/admin
	Route::get('notification/admin','AdminUsersController@notificationAdmin');




	// setting - website general 
	Route::get('settings','SettingsController@settings')->name('settings');
	Route::post('settings','SettingsController@settings_save');
	Route::get('files','SettingsController@show');

	Route::any('logout' , 'AdminAuthController@logout');
    Route::get('lang/{lang}',function($lang){
        session()->has('lang')?session()->forget('lang'):'';
        $lang =='ar'? session()->put('lang','ar'): session()->put('lang','en');
        return back();

    });

});


});