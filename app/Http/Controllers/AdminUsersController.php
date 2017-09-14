<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUsersController extends Controller
{
    public function index()
    {
        return view('admin.index')->with('users',User::paginate(20));
    }
}
