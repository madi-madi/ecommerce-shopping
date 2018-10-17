<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
class Admin extends Authenticatable 
{
    //

    use SoftDeletes;

    use Notifiable;

    protected $table = "admins";
     // protected $primaryKey = 'yourPrimaryKey';
        protected $fillable = [
        'name', 'email', 'password',
    ];
        protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsTo('App\Role','role_id');
    }

    public function productsme(){
        return $this->hasMany('App\Product','admin_id');
    }
    public function hasRole($title)
    {
        $admin_role = $this->roles;
        if (! is_null($admin_role)) {
            $admin_role = $admin_role->role_name;  
          }
          return ($admin_role === $title)? true :false;
    }
}
