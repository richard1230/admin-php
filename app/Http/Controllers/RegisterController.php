<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function __invoke(Request $request)
    {

        $request->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);

        $user = User::create([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
       return $user;
    }
}
