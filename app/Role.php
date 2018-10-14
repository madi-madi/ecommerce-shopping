<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = ['role_name'];
    protected $hidden = ['id','created_at','updated_at'];
}
