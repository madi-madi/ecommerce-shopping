<?php

namespace App\Http\Controllers\Auth;

use App\User;
//  create token verify
use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\verifyEmail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public static $user = Null;
    public function __construct()
    {
        if (self::$user == Null) {
            self::$user = new User;
        }
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $create_user =  self::$user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // create verify token 
            'verify_token'=> Str::random(40),
        ]);

        $thisUser = self::$user->findOrFail($create_user->id);
        $this->sendEmail($thisUser);
            return $create_user;
        
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst()
    {
        return view('auth.verify_email_first');
    }

    public function verificationDone($email, $verifyToken)
    {
        $user_verify = self::$user->where(['email'=>$email ,'verify_token'=>$verifyToken])->first();
        if ($user_verify) {
        $user_verify_done = self::$user->where(['email'=>$email ,'verify_token'=>$verifyToken])->update(['status'=>1,'verify_token'=>Null]);
        $user_verify = self::$user->where(['email'=>$email ,'status'=>1])->first();
        Auth::login($user_verify, true);
      return   redirect($this->redirectPath());
        // return $this->guard()->login($user_verify);
        
            
        }else{
            return 'Sorry User Not Found ...';
        }
        // return $user_verify;
    }
}
