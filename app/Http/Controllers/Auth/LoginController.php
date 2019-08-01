<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function redirectTo() 
    {
        if (Auth::check()) {
            $username = Auth::user()->username;
            if (Auth::user()->RoleID == 1) {
                $route = '/Dashboard';
            } elseif (Auth::user()->RoleID == 2) {
                $route = '/Data'.'/'.$username.'/DataEntry';
            }
        }

        return $route;      
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        
        return redirect()->route('login');
    }
}
