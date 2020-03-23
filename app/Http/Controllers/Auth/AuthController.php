<?php

namespace crmcomercial\Http\Controllers\Auth;

use crmcomercial\User;
use Validator;
use crmcomercial\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    protected $username = "username";

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function index()
    {
        $errors = null;

        if(Auth::user())
        {
            return view('welcome');

        }else{

            return view('auth.login', compact('errors'));
        }

    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      /*  dump($data);
        dd();*/
        return Validator::make($data, [
            'name' => 'required|max:255',
            'login' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      /*  dump($data);
        dd();*/
        return User::create([
            'ven_nombre' => $data['name'],
            'ven_usuario' => $data['login'],
            'username' => $data['login'],
            'ven_email' => $data['email'],
            'ven_clave' => bcrypt($data['password']),
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    /*protected function getCredentials(Request $request)
    {
        return [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
    }*/

}
