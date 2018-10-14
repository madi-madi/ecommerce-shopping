<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
			'title',
			'description',
			'price',
			'category_id',
			'admin_id',
			'weight',
    ];

    public function images()
    {
    	return $this->hasMany('App\Image','product_id');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
