<?php

namespace App\Http\Middleware;

use Closure;

class Delete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $SuperAdmin , $admin)
    {
        $admin = $request()->user('admin');
        return ($admin->hasRole($SuperAdmin) || $admin->hasRole($Admin))? $next($request) : response(view('errors.404'),404);
        return $next($request);
    }
}
