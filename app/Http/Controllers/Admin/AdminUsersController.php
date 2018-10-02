<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminUsersController extends Controller
{
    public static $user = Null;
    public function __construct()
    {
        if (self::$user == Null) {
            self::$user = new User;
        }
    }
 
    public function index()
    {
        if (request()->ajax() ) {
        # code...
        $users = self::$user->withTrashed()->paginate(10);
        return response($users);

        }

        return view ('admin.users', ['title'=>trans('admin.user_title')]);
    }

    public function deleteUser($id)
    {
        // find user 
        $userDelete = self::$user->find($id);
        //  delet User
        $userDelete->delete();
    }
    public function restoreUser($id)
    {
        // find user 
        $userRestore = self::$user->onlyTrashed()->find($id);
        //  restore  User
        $userRestore->restore();   
    }
    public function deleteforeverUser($id)
    {
        // find user 
        $deletForever = self::$user->onlyTrashed()->find($id);
        //  delete for ever  User
        $deletForever->forceDelete(); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notificationAdmin()
    {
       $notify_data =  Auth::guard('admin')->user()->notifications()->get();
       return response($notify_data);

    }
    public function create()
    {
        return view('admin.userstables.create',['title'=>trans('admin.create_user')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       // return request();
   $data = $this->validate(request(),
            [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'level'=>'required|in:user,company,vendor',
            'password'=>'required|min:6',
        ],[],[
            // nice name
            'name'=> trans('admin.name'),
            'email'=> trans('admin.email'),
            'level'=> trans('admin.level'),
            'password'=> trans('admin.password'),

        ]);

        //    return $data;
        $data['password']= bcrypt(request('password'));
        User::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $title = trans('admin.edit');
        return view('admin.userstables.edit',compact('user','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
   $data = $this->validate(request(),
            [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,// escap this 
            'level'=>'required|in:user,company,vendor',
            'password'=>'sometimes|nullable|min:6',
        ],[],[
            // nice name
            'name'=> trans('admin.name'),
            'email'=> trans('admin.email'),
            'level'=> trans('admin.level'),
            'password'=> trans('admin.password'),

        ]);
        if (request()->has('password')) {
        $data['password']= bcrypt(request('password'));
            
        }
        User::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return request();
        User::find($id)->delete();
    session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }

    public function multple_destroy(){
     //   return request();
        if (is_array(request('item'))) {
           User::destroy(request('item')); 
        }else{
           User::find(request('item'))->destroy(); 

        }
    session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }
}
