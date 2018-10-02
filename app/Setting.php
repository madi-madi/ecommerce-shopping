<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Notifiable;
    protected $table = 'settings';
         protected $fillable = [
        'site_name_ar', 'site_name_en', 'logo','icon',
        'site_email','main_lang','description','keywords','status','message_maintenance'
    ];
}
