<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
 	//($request ,$upload_type = 'single', $path, $new_name = null, $curd_type = [])
    public static function upload($data = [])
    {
    	if (in_array('new_name', $data)) {
    	$new_name = $data['new_name'] === null? time():$data['new_name'];
   
    	}
    	
    	if (request()->hasFile($data['file']) && $data['upload_type'] == 'single') {
    		# code...
            in_array('delete_file',$data) && !empty($data['delete_file']) ? Storage::delete($data['delete_file']) : '';
            $pathStore = request()->file($data['file'])->store($data['path']);
            $pathDb = substr($pathStore , 7);
            // dd($pathDb);
            return $pathDb;
    	}
    }
}
