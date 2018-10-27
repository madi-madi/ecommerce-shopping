<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = ['role_name','admin_id'];
    protected $hidden = ['updated_at'];
        public function admin()
    {
   		return $this->belongsTo('App\Admin');
    }
}
