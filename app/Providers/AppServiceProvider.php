<?php

namespace App\Providers;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\ServiceProvider;
use App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Product::observer(ProductObserver::class);
         Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
