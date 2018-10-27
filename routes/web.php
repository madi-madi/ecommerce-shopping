
<?php

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



// Route::group(['prefix'=> 'admin', 'namespace'=>'Admin'], function(){
// 	Route::get('/', function () {
//     return view('admin.home');
// });
// });
Route::group(['middleware'=>'maintenance'],function(){

Route::get('/', 'frontendProductController@index');
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verification/{email}/{verifyToken}','Auth\RegisterController@verificationDone')->name('verification');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


});

Route::get('maintenance',function(){
        if (settings()->status == 'open') {
            # code...
            return redirect('/');
        }
	return view('style.maintenance');
});

