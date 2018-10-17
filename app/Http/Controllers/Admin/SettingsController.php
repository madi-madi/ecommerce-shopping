<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Storage;
use Upload;
use Auth;
use App\Admin;
use App\Notifications\UpdateSettings;



class SettingsController extends Controller
{
    public static $admins = Null;
   public static $settings = Null;
    public function __construct()
    {
         // dd($settings->orderBy('id','desc')->first());
        if (self::$settings == Null) {
            self::$settings = new Setting;
        }

        if (self::$admins == Null) {
            self::$admins = new Admin;
        }
    }
    public function settings()
    {
        if (request()->ajax()) {
            $settings = self::$settings->orderBy('id','desc')->first();
         return response($settings);   
        }

        return view('admin.settings',['title'=> trans('admin.settings')]);
    }

    public function settings_save()
    {
        $data = request()->all();

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
            !empty(settings()->logo) ? Storage::delete('public/'.settings()->logo) : '';

            $data['logo'] = Upload::upload([
                           // 'new_name'=>'',
                            'file'=>'logo',
                            'path'=>'public/settings',
                            'upload_type'=>'single',
                            'delete_file'=>settings()->logo
                        ]);

        }

        if (request()->hasFile('icon')) {

            !empty(settings()->icon) ? Storage::delete('public/'.settings()->icon) : '';
            $data['icon'] = Upload::upload([
                           // 'new_name'=>'',
                            'file'=>'icon',
                            'path'=>'public/settings',
                            'upload_type'=>'single',
                            'delete_file'=>settings()->icon
                        ]);
         //   $data['icon'] = request()->file('icon')->store('public');
        }
        
    	$setting =  self::$settings->orderBy('id','desc')->update($data);
            $settingsUpdate = self::$settings->orderBy('id','desc')->first();

        if ($setting) {
          $admins =   self::$admins->all();
          // dd($admins);
            foreach ($admins as $admin) {
               $admin_auth =  Auth::guard('admin')->user();
               // dd($admin);
               // if ($admin->id !== $admin_auth->id) {
                $admin->notify(new UpdateSettings($admin,$settingsUpdate));
                   
               // }
            }
        }

       return  response($settingsUpdate);
        // session()->flash('success',trans('admin.record_updated'));
    	// return redirect(aurl('settings'));

    }

        public function show(){
        return Storage::allFiles('public');
    }

}
