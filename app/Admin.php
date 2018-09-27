<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable 
{
    //
    use Notifiable;

    protected $table = "admins";
     // protected $primaryKey = 'yourPrimaryKey';
        protected $fillable = [
        'name', 'email', 'password',
    ];
        protected $hidden = [
        'password', 'remember_token',
    ];
}
