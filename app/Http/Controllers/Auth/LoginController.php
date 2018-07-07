<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/';

    /**
    * Since we don't collect email, we need override the property we use
    * to authenticate users.
    */
    public function username()
    {
        return 'username';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
