<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (Auth::check()) {
            $username = Auth::user()->username;

            if (Auth::user()->RoleID == 1) {
                return $next($request);
            } 
            return redirect('/Data'.'/'.$username.'/DataEntry');
        }
    }
}
