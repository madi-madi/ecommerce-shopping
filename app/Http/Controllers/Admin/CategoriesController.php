<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{

	public static $categories = Null;
	public static $products = Null;
	public function  __construct(){
		if (self::$categories == Null) {
			self::$categories = new Category;
		}

		if (self::$products == Null) {
			# code...
			self::$products = new Product;
		}

	}
    //
        public function getCategoriesAll()
    {
        if (request()->ajax()) {
        $categories = self::$categories->with('products')->paginate(10);
        return response($categories);
        }

        return view('admin.categories.categories',['title'=>trans('admin.categories')]);


    }


	    public function getProducsInCategory($category_slug)
    {
    	session()->put('category_slug',$category_slug);
    	$category = self::$categories->where('category_slug',$category_slug)->first();
    	$category_id = $category->id;
         	$products = self::$products
        ->withTrashed()
        ->with('images')
        ->with('category')
       ->with('admin')
       ->where('category_id',$category_id)
        ->orderBy('id','desc')
        ->paginate(5);
        if (request()->ajax()) {

        return  response($products);
        }

        return view('admin.categories.products_category',['title'=>trans('admin.categories')]);


    }
}
