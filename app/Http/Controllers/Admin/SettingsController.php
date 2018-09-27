<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Storage;
use App\Http\Controllers\Upload;
class SettingsController extends Controller
{
    public function settings()
    {

        return view('admin.settings',['title'=> trans('admin.settings')]);
    }

    public function settings_save()
    {
        $data = request()->except(['_token','_method']);

    $this->validate(request(),[
            'logo'=>v_image(),
            'icon'=>v_image(),
            'status'=>              '',
            'message_maintenance'=> '',
            'keywords'=>            '',
            'description'=>         '',
            'site_email'=>          '',
            'site_name_en'=>        '',
            'site_name_ar'=>        '',


        ],[],[

            'logo'=>trans('admin.logo'),
            'icon'=>trans('admin.icon'),
        ]
    );
        if (request()->hasFile('logo')) {
            !empty(settings()->logo) ? Storage::delete(settings()->logo) : '';

            $data['logo'] = Upload::upload([
                           // 'new_name'=>'',
                            'file'=>'logo',
                            'path'=>'public/settings',
                            'upload_type'=>'single',
                            'delete_file'=>settings()->logo
                        ]);

        }

        if (request()->hasFile('icon')) {

            !empty(settings()->icon) ? Storage::delete(settings()->icon) : '';
            $data['icon'] = Upload::upload([
                           // 'new_name'=>'',
                            'file'=>'icon',
                            'path'=>'public/settings',
                            'upload_type'=>'single',
                            'delete_file'=>settings()->icon
                        ]);
         //   $data['icon'] = request()->file('icon')->store('public');
        }
        /*
    	$data = request()->except(['_token','_method']);
        if active this except  store url img error : "/opt/lampp/temp/phpVrzpO1"
        */
    	Setting::orderBy('id','desc')->update($data);
        session()->flash('success',trans('admin.record_updated'));
    	return redirect(aurl('settings'));
    }

        public function show(){
        return Storage::allFiles('public');
    }

}