<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        protected $table = 'categories';
    protected $fillable = [
			'category_name',
			'category_slug',

    ];

    public function products(){
    	return $this->hasMany('App\Product','category_id');
    }

    public function admin()
    {
   		return $this->belongsTo('App\Admin');
    }

}
