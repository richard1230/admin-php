<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //
    public  function __invoke(LoginRequest $request){
//        $request->validate([
//            'email'=>'required|email',
//            'password'=>'required|min:6',
//        ]);
        $user = User::where('email',$request->email)->first();
//        if (!$user || Hash::check($request->password,$user->password)){
//
//        }

        if (!Hash::check($request->password,$user->password)){
            throw  ValidationException::withMessages([
                'password'=>'密码输入错误'
            ]);
        }
    }
}
