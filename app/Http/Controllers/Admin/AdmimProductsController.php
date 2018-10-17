<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpladRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image;
use Upload;
use Auth;
use Storage;
class AdmimProductsController extends Controller
{

    public static $products = Null;
    public static $categories = Null;
    public static $images = Null;



    public function __construct()
    {
    	if (self::$products == Null) {
    		self::$products = new Product;
    	}

        if (self::$categories == Null) {
            self::$categories = new Category;
        }

        if (self::$images == Null) {
            self::$images = new Image;
        }
    }

    public function index(){
    	if (request()->ajax()) {
    	$products = self::$products
        ->withTrashed()
        ->with('images')
        ->with('category')
       ->with('admin')
        ->orderBy('id','desc')
        ->paginate(10);
    		return response($products);
    	}
        return view('admin.products.products',['title'=>trans('admin.products')]);

    }

    public function getCategories()
    {
        if (request()->ajax()) {
        $categories = self::$categories->all();
        return response($categories);
        }

        return view('admin.categories.categories',['title'=>trans('admin.categories')]);


    }

    public function createProduct(UpladRequest $request)
    {
        // $data = request()->all();
        // $this->validate(request(),[
        //     'title'=>'required',
        //     'description'=>'required',
        //     'price'=>'required',
        //     'weight'=>'required',
        //     'files'=>'sometimes',
        //     'category_id'=>'required',
        // ],[
        //     'title'=>trans('admin.title_product'),
        //     'description'=>trans('admin.desc_product'),
        //     'price'=>trans('admin.price_product'),
        //     'weight'=>trans('admin.weight_product'),
        //     'files'=>trans('admin.files_product'),
        //     'category_id'=>trans('admin.category_id_product'),
        // ],[]);
        // return request()->all();

        $create_product = self::$products->create([
            'title'=>request('title'),
            'description'=>request('description'),
            'price'=>request('price'),
            'weight'=>request('weight'),
            'category_id'=>request('category_id'),
            'admin_id'=>Auth::guard('admin')->user()->id,
        ]);

        if (request()->has('file_product')) {
            $files = request('file_product');
            
            if (!is_null($files)) {
            foreach ( request('file_product') as  $file) {

            $image = time().'.'.$file->getClientOriginalExtension();
           $filename =  $file->store('public/products');
            $path_imageDB = substr($filename , 7);
            $Upload_img_product = self::$images->create([
            'product_id'=> $create_product->id,
            'product_image'=>$path_imageDB,
            ]);
            }
            }

        }else{
       $Upload_img_product = self::$images->create([
        'product_id'=> $create_product->id,
    
      ]);   
        }
       $product_with_images =  self::$products
       ->withTrashed()
       ->with('images')
       ->with('category')
       ->with('admin')
       ->find($create_product->id);
        return response($product_with_images);
    }

    public function deleteImage($id)
    {

       $product_image_delete = self::$images->find($id);
       Storage::delete('public/'.$product_image_delete->product_image);
       $del = $product_image_delete->delete();
       // return $del;
        $update_product  = self::$products
        ->withTrashed()
        ->with('images')
        ->with('category')
       ->with('admin')

        ->find($product_image_delete->product_id);

        return response($update_product);
    }


    public function deleteProduct($id)
    {
        // dd($id);
        // find user 
        $productDelete = self::$products->find($id);
        //  delet admin
       $deleted =  $productDelete->delete();
       if ($deleted) {
        // return $id;
        $getProductDeleted = self::$products->withTrashed()->find($id);
        return response($getProductDeleted);
       }

    }
    public function restoreProduct($id)
    {
        // find user 
        $productRestore = self::$products->onlyTrashed()->find($id);
        //  restore  admin
     $restored =   $productRestore->restore();  
        if ($restored) {
        // return $id;
        $getProductRestoreed = self::$products->withTrashed()->find($id);
        return response($getProductRestoreed);
        } 
    }
    public function deleteforeverProduct($id)
    {
        // find admin 
        $deletForever = self::$products->onlyTrashed()->find($id);
        //  delete for ever  User
        $deletForever->forceDelete(); 
    }

    public function updateProduct($id)
    {
        // self::$products->where('id',$id)->update($request->all());
        // return request()->all();
                $update_product = self::$products->where('id',$id)->update([
            'title'=>request('title'),
            'description'=>request('description'),
            'price'=>request('price'),
            'weight'=>request('weight'),
            'category_id'=>request('category_id'),
            'admin_id'=>Auth::guard('admin')->user()->id,
        ]);
        
    }

    public function upload_new_file_product()
    {
     // return request('files')->getClientOriginalName();

        // return request()->all();
        if (request('file_product')) {
            $myfiles = [];
            foreach ( request('file_product') as  $file) {

           $filename =  $file->store('public/products');
            $path_imageDB = substr($filename , 7);
            $Upload_img_product = self::$images->create([
            'product_id'=> request('product_id'),
            'product_image'=>$path_imageDB,
            ]);
            $myfiles[]= $Upload_img_product;
            }
            $id = request('product_id');
    $newfiles   = self::$images->where('product_id',$id)->get();
    return response($myfiles);
            
        }

    }

}
