<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
    	'product_id',
    	'product_image'
    ];
    protected $hidden = [
    	'created_at',
    	// 'product_id',
    	'updated_at'
    ];
}
