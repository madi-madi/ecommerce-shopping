<?php
if (!function_exists('settings')) {
	# code...
	function settings()
	{
		return \App\Setting::orderBy('id','desc')->first();
	}
}


if (!function_exists('aurl')) {
	# code...
	function aurl($url= null)
	{
		return url('admin/'.$url);
	}
}

if (!function_exists('admin')) {
	# code...
	function admin()
	{
		return auth()->guard('admin');
	}
}


if (!function_exists('active_menu')) {
	# code...
	function active_menu($link)
	{
		
	    if(preg_match('/'.$link.'/',Request::segment(2))){

	    	return ['menu-open','display:block'];
	    }else{

	    	return ['',''];

	    }
	}
}

if (!function_exists('lang')) {
	function lang(){
		if (session()->has('lang')) {
			return session('lang');
		}else{
			return settings()->main_lang;
		}
	}
}
if (!function_exists('direction')) {
	function direction(){
		if (session()->has('lang')) {
		if (session('lang') == 'ar') {
			return 'rtl';
		}else{
			return 'ltr';
		}	
		}else{
			return 'ltr';
		}
	}
}


 /** Validate Helper function image **/
if (!function_exists('v_image')) {
	 function v_image($ext = null){
		if ($ext===null) {
			return 'image|mimes:jpg,jpeg,png,bmp';
		}else{
			return 'image|mimes:'.$ext;
		}
	}
 }

 /** Validate Helper function image **/
