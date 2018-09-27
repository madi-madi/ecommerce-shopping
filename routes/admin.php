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
	// setting - website general 
	Route::get('settings','SettingsController@settings');
	Route::post('settings','SettingsController@settings_save');
	Route::get('files','SettingsController@show');

	Route::any('logout' , 'AdminAuth@logout');
    Route::get('lang/{lang}',function($lang){
        session()->has('lang')?session()->forget('lang'):'';
        $lang =='ar'? session()->put('lang','ar'): session()->put('lang','en');
        return back();

    });

});


});