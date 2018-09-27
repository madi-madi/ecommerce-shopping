<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    */
    public function index(UsersDatatable $users)
    {
        return $users->render('admin.userstables.index', ['title'=>trans('admin.user_title')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
