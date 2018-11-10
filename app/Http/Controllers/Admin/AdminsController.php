<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use App\Notification;
use Location;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $admins = Null;
    public static $notifications = Null;
    public static $roles = Null;

    public function __construct()
    {
        if (self::$admins == Null) {
            self::$admins = new Admin;
        }

        if (self::$roles == Null) {
            self::$roles = new Role;
        }

        if (self::$notifications == Null) {
            self::$notifications = new Notification;
        }
    }
    public function index()
    {
        // dd($admins);withTrashed

        // $ip= \Request::getClientIp();
        // $data = Location::get($ip);
        // dd($data,$ip);
        if (request()->ajax()) {
        $admins = self::$admins->withTrashed()->with('roles')->orderBy('id','desc')->paginate(10);
        return response($admins);
        }
        return view('admin.admins',['title'=>trans('admin.admins_cp')]);
    }

    public function storeAdmin()
    {
        $data = $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
            'role_id'=>'required|numeric',
        ],[],[
        'name'=> trans('admin.name'),
        'email'=> trans('admin.email'),
        'password'=> trans('admin.password'),
        'role_id'=> trans('admin.role_id'),
        ]);
        $data['password'] = bcrypt(request('password'));
        $newAdmin = self::$admins->create($data);
        $newAdminWithRoles = self::$admins->withTrashed()->with('roles')->find($newAdmin->id);
        return response($newAdminWithRoles);
    }


    public function deleteAdmin($id)
    {
        // dd($id);
        // find user 
        $adminDelete = self::$admins->find($id);
        //  delet admin
       $deleted =  $adminDelete->delete();
            if ($deleted) {
        // return $id;
        $getAdminRestoreed = self::$admins->withTrashed()->find($id);
        return response($getAdminRestoreed);
        } 
    }
    public function restoreAdmin($id)
    {
        // find user 
        $adminRestore = self::$admins->onlyTrashed()->find($id);
        //  restore  admin
      $restored =  $adminRestore->restore();   
        if ($restored) {
        $getAdminRestoreed = self::$admins->withTrashed()->find($id);
        return response($getAdminRestoreed);
        } 
    }
    public function deleteforeverAdmin($id)
    {
        // find admin 
        $deletForever = self::$admins->onlyTrashed()->find($id);
        //  delete for ever  User
        $deletForever->forceDelete(); 
    }


    public function updateAdmin($id){
        // dd(request()->all());
        $data = $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins,email,'.$id,
            'role_id'=>'required',
            'password'=>'sometimes|nullable|min:6',
            'remember_token'=>'',

        ],[],[
            // nice name
            'name'=> trans('admin.name'),
            'email'=> trans('admin.email'),
            'role_id'=> trans('admin.role'),
            'password'=> trans('admin.password'),

        ]);
        if (request()->has('roles')) {
           // dd(request('roles')['role_name']);
           $role_name = request('roles')['role_name'];
          $r = self::$roles->where('role_name', $role_name)->first();
          // dd($r->id);

        }
        // dd($data['role_id']);
        if ($data['role_id'] !== $r->id) {
            # code...
            $data['role_id'] = $r->id;
        }

        $admin = self::$admins->where('id',$id)->update($data);

    }

    public function getRoles($id)
    {
        if (request()->ajax()) {
        $roles = self::$roles->all();
        return response($roles);
        }
    }

    public function indexRole()
    {
        if (request()->ajax()) {
             $roles = self::$roles->with('admin')->paginate(10);
        return response($roles);   
        }
        return view('admin.roles.roles',['title'=>trans('admin.roles')]);

    }

    public function createRole()
    {
    $this->validate(request(),[
    'role_name'=>'required|unique:roles',
    ],[
    'role_name'=>trans('admin.role_name'),
    ],[]);

    $create_role = self::$roles->create([
    'role_name'=>request('role_name'),
    'admin_id'=>admin()->user()->id,

    ]);
    $created_role = self::$roles->with('admin')->find($create_role->id);

    return response($created_role);

    }

    public function indexNotification()
    {
     $notifications  =   self::$notifications->paginate(20);
     if (request()->ajax()) {
         return response($notifications);
     }
        return view('admin.notifications.notifications',['title'=>trans('admin.notifications')]);
    }


}
