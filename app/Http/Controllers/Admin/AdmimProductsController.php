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
    //
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

        $create_product = self::$products->create([
            'title'=>request('title'),
            'description'=>request('description'),
            'price'=>request('price'),
            'weight'=>request('weight'),
            'category_id'=>request('category_id'),
            'admin_id'=>Auth::guard('admin')->user()->id,
        ]);

        



        if (request()->has('files')) {
            $files = request('files');
            
            if (!is_null($files)) {
            foreach ( request('files') as  $file) {

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
        // 'product_image'=>$imageName,
      ]);   
        }
        // return request('files');
       $product_with_images =  self::$products
       ->withTrashed()
       ->with('images')
       ->with('category')
       ->find($create_product->id);
        return response($product_with_images);
    }

    public function deleteImage($id)
    {

       $product_image_delete = self::$images->find($id);
       Storage::delete('public/'.$product_image_delete->product_image);
       $product_image_delete->delete();

        $update_product  = self::$products
        ->withTrashed()
        ->with('images')
        ->with('category')
        ->find($product_image_delete->product_id);

        return response($update_product);
    }
}
