<?php

namespace App\Http\Controllers;
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
        request()->validate([
            'email' =>['required','email',Rule::unique('users')->ignore(auth()->id())]
        ]);

        auth()->user()->update(request()->all());
        Session::flash('success','You updated your account!');
        return back();

    }
}
