<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);
    }
    //create a new user via modal popup
    protected function register_user(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'g-recaptcha-response'=>'required'
        ]);

        $token = $request['g_recaptcha_response'];
        if($token){
            $client = new Client();
            $response = $client->post(
                'https://www.google.com/recaptcha/api/siteverify',
                ['form_params'=>
                    [
                        'secret'=>env('GOOGLE_RECAPTCHA_SECRET'),
                        'response'=>$token
                    ]
                ]
            );

            $results = json_decode((string)$response->getBody()->getContents());
            if ($results->success) {
                //if the token is ok check to see if the others field are validated
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6',
                ]);
                //if the validation is ok create the user else return back with errors
                if($validator->passes()){
                    event(new Registered($user = $this->create($request->all())));
                    $this->guard()->login($user);
                    return response()->json(['success' => 'Welcome']);
                }else{
                    return response()->json(['error' => $validator->errors()->all()]);
                }

            //if the token is not ok display error message
            }else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
          //if the captcha is unchecked display error message
        }else{
            return response()->json(['error' => $validator->errors()->all()]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' =>User::getUsername($data['name']),
        ]);
    }
}
