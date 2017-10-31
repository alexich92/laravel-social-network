<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\ProfileImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\User;

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

    public function showProfileView()
    {
        return view('user_settings.profile')->with('profile_images');
    }

    public function updateProfile(UpdateProfileRequest $request){
        $input = $request->all();

        if($file  = request()->file('avatar'))
        {
            $filename = time().$file->getClientOriginalName();
            $file->move('images/avatars',$filename);
            $input['avatar'] = $filename;
        }

        auth()->user()->update($input);
        Session::flash('success','Profile updated!');
        return redirect()->back();
    }


    public function showDeleteUserView()
    {
        return view('user_settings.delete_user');
    }

    public function random_image()
    {
        $random_image = ProfileImage::orderByRaw('RAND()')->pluck('image')->get(1);
        return response()->json($random_image);
    }

    public function destroy($id)
    {
       request()->validate([
           'password'=>'required'
       ]);

        if(Hash::check(request()->password,auth()->user()->password))
        {
            User::destroy($id);
            Session::flash('success','We will miss you. Your account has been deleted!');
            return redirect()->route('home');

        }

        return  back()->withErrors(['password' => ['Your password is incorrect']]);


    }
}
