<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->isAdmin()) {
            return redirect()->intended('/admin');
        }
        return redirect()->intended('/');
    }

    public  function  login_modal_users(Request $request)
    {

        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $user = $request->all();
        if(Auth::attempt($user)){
            return redirect('/');
        }else{
            return response()->json(['error'=>'Wrong Email or password combination.']);
        }
    }
}
