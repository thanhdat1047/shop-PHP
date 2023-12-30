<?php

namespace App\Http\Middleware;
use Closure;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $user = Auth::user();// lay thong tin user
        //kiem tra quyen cua nguoi dung 
        $route = $request->route()->getName();
        if($user->cant($route)){
            return redirect()->route('admin.error',['code'=> 403]);
        }
        return $next($request);
    }
}
