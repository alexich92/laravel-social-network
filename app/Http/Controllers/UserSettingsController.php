<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserSettingsController extends Controller
{
    public function showAccountView()
    {
        return view('user_settings.account');
    }

    public function updateAccount()
    {
       $validatedData =  request()->validate([
            'email' =>['required','email',Rule::unique('users')->ignore(auth()->id())],
            'username'=>['required','min:3',Rule::unique('users')->ignore(auth()->id())]
        ]);

        auth()->user()->update($validatedData);
        Session::flash('success','You updated your account!');
        return back();

    }

    public function showPasswordView()
    {
        return view('user_settings.password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->input('new_password'))]);
        Session::flash('success','Your password has been updated');
        return back();
    }
}
