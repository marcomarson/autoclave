<?php

namespace App\Http\Controllers\ClientAuth;

use App\Cliente;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $redirectTo = '/regEsterilizacao';
     protected $guard = 'client';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function showLoginForm()
  {
      if (view()->exists('auth.authenticate')) {
          return view('auth.authenticate');
      }
      return view('clientauth.login');
  }
  public function showRegistrationForm()
  {
      return view('clientauth.register');
  }
}
