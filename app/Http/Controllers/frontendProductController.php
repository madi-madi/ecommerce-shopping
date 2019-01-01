<?php

namespace App\Http\Controllers;
use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;
use App\Product;
use App\Rate;
use Auth;
class frontendProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $products = NULL;
    public static $rates = NULL;

    public function __construct(){
        if (self::$products == NULL) {
           self::$products = new Product;
        }
        if (self::$rates == NULL) {
            self::$rates = new Rate;
        }
    }
    public function index()
    {
        if (request()->ajax()) {
        $products = self::$products
                ->with('images')
                ->with('category')
                ->with('rates')
                ->orderBy('id','desc')
                ->paginate(6);
                $productsElect = self::$products
                ->where('category_id','=',2)
                ->with('images')
                ->with('category')
                ->with('rates')
                ->orderBy('id','desc')
                ->paginate(8);
                $productsPhones = self::$products
                ->where('category_id','=',1)
                ->with('images')
                ->with('category')
                ->with('rates')
                ->orderBy('id','desc')
                ->paginate(8);
        // return $products;
        return response(['products'=>$products,'productsElectronic'=>$productsElect,'productsPhones'=>$productsPhones]);
        }
    return view('welcome');
        
    }

    public function productRate($id){
        $auth_id = Auth::id();
        $rating = self::$rates
        ->where('user_id','=',$auth_id)
        ->where('product_id','=',$id)->first();
       // return $rating;
        if ($rating === null) {
            $createRate = self::$rates->create([
                'product_id'=>$id,
                'user_id'=> $auth_id,
                'rating'=> request('rating')
            ]);
            $allRates =  self::$products->with('rates')->find($id);
            //    echo $allRates->rates->count().'<br/>>';
           $rateSum = 0;
        if ($allRates->rates->count() > 0) {
            foreach($allRates->rates as $rate){
                $rateSum = $rateSum + floatval($rate['rating']);
            }
            //return  $rateSum;

            
            $countRates = $allRates->rates->count();
            $resultRate = $rateSum / $countRates;
            $resultRate = number_format((float)$resultRate,2,'.','');
            
            $updateProduct = self::$products->where('id',$id)->update(['rate'=>$resultRate]);
            //return $updateProduct;
            $category_id = $allRates->category_id;
            $productRating = self::$products
                                    ->where('id',$id)
                                    ->where('category_id',$category_id)
                                    ->with('images')
                                    ->with('category')
                                    ->with('rates')
                                    ->first();
            return response($productRating);
        }
        }else{
            return  "Sorry you are rated it befor ... ";
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
