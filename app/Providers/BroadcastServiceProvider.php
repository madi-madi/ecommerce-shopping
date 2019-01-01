<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Broadcast::routes();
Broadcast::routes(['middleware' => ['web','auth:admin']]);
Broadcast::channel('App.Admin.{id}', function ($admin, $id) {
    // return (int) $user->id === (int) $id;
     // return $admin->id === $id && get_class($admin) === 'App\Admin';
    return true;
});

        // require base_path('routes/channels.php');
    }
}
