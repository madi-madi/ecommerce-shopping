<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Update
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$SuperAdmin , $Admin )
    {
        $admin =Auth::guard('admin')->user();

        // dd($admin);
        // dd($admin);
        if (Auth::guard('admin')->guest()) {
       return response(view('errors.401'),401);
            
        }else{
               return($admin->hasRole($SuperAdmin)||$admin->hasRole($Admin) && Auth::guard('admin')->check())? $next($request):response(view('errors.401'),401);
        }
     // return($admin->hasRole($SuperAdmin)||$admin->hasRole($Admin))? $next($request):response(view('errors.401'),401);
     
        return $next($request);
    }
}
