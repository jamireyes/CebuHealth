<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->type == '0') {
            return $next($request);
        }elseif (Auth::check() && Auth::user()->type == '1'){
            return redirect('/home');
        }
    }
}
