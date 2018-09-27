<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mail\AdminResetPassword;
use App\Mail;
use App\Admin;
use Carbon\Carbon;
use DB;


class AdminAuthController extends Controller
{
  //
    public function login()
    {
      // 
    	return view('admin.login');
    }

    public function dologin()
    {
      //  dd($request->all());
      $rememberme = request('rememberme') == 1 ?true:false;
      admin()->attempt(

      ['email'=>request('email'),'password'=>request('password')],$rememberme);
      if(admin()->attempt(

      ['email'=>request('email'),'password'=>request('password')],$rememberme)){
      return redirect('admin');
      }else{
      session()->flash('error_login',trans('admin.incorrect_admin_login'));
      return redirect(aurl('login'));
      }

    }
    public function logout()
    {
        admin()->logout();
        return redirect(aurl('login'));
   
    }

    public function forgot_password()
    {
        return view('admin.forgot_password');
    }

    public function forgot_password_post()
    {
      $admin = Admin::where('email', request('email'))->first();
      if (!empty($admin)) {
      $token = app('auth.password.broker')->createToken($admin);
      $data = DB::table('password_resets')
      ->insert([
      'email'=> $admin->email,
      'token'=>  $token,
      'created_at'=> Carbon::now()
      ]);
      // return new AdminResetPassword(['data'=>$admin,'token'=>$token]);
      Mail::to($admin->email)
      ->send(new AdminResetPassword([
      'data'=>$admin,
      'token'=>$token])
      );
      session()->flash('success',trans('admin.the_link_reset_password_sent'));
      return back();             
      }

      return back();
    }



    public function reset_password($token)
    {
      $check_token = DB::table('password_resets')
      ->where('token' , $token)
      ->where('created_at' , '>' , 
      Carbon::now()
      ->subHours(6))->first();

      if (!empty($check_token)) {
      // return dd($check_token);
      return view('admin.reset_password' ,['data'=> $check_token]);
      }else{

      return redirect(aurl('forgot/password'));
      }
    }

    public function reset_password_final($token){
      //return request();
      $this->validate(request(),[
      'password'=>'required|confirmed',
      'password_confirmation'=>'required'
      ],[],[
      'password'=> 'Password',
      'password_confirmation'=>'Confirm Password'
      ]);
      $check_token = DB::table('password_resets')
      ->where('token' , $token)
      ->where('created_at' , '>' , 
      Carbon::now()
      ->subHours(6))->first();
      if (!empty($check_token)) {
      $admin = Admin::where('email' , $check_token->email)
      ->update([
      'email'=>$check_token->email ,
      'password'=>bcrypt(request('password'))
      ]);

      DB::table('password_resets')
      ->where('email' , request('email'))
      ->delete();
      admin()->attempt(['email'=>$check_token->email , 'password'=> request('password')],true);
      return redirect(aurl());
      # code...
      }else{

      return redirect(aurl('forgot/password'));
      }
        
    }
}
