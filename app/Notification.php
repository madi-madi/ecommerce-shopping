<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table = 'notifications';
    protected $filable = ['type','notifiable_type','notifiable_id','data','read_at'];
    protected $hidden = [ 'notifiable_id','updated_at'
    ];
}
