<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Role;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $admins = Null;
    public static $roles = Null;

    public function __construct()
    {
        if (self::$admins == Null) {
            self::$admins = new Admin;
        }

        if (self::$roles == Null) {
            self::$roles = new Role;
        }
    }
    public function index()
    {
        // dd($admins);withTrashed
        if (request()->ajax()) {
        $admins = self::$admins->withTrashed()->with('roles')->paginate(10);
        return response($admins);
        }
        return view('admin.admins',['title'=>trans('admin.admins_cp')]);
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


}
