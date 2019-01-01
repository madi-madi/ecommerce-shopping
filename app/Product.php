<?php

namespace App;
use App\Scopes\ProductAdminScope;
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
            'product_count',
            'discount',
            'from',
            'to'
    ];

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::addGlobalScope(new ProductAdminScope);
    // }
    // protected $timesstamps= false;
    // $dateFormat ='U';
    // const CREATED_AT ='creation_date';
    // const UPDATED_AT = 'last_update';
    // protected $connection = 'connection-name';
        protected $guarded = ['deleted_at'];


    public function images()
    {
    	return $this->hasMany('App\Image','product_id');
    }

    public function rates()
    {
    	return $this->hasMany('App\Rate','product_id');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

        public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
