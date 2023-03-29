<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public  function __invoke(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        $user = User::where('email',$request->email)->first();
        if (!$user || Hash::check($request->password,$user->password)){

        }
    }
}
