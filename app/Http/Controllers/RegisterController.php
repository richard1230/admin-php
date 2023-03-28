<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $user = User::create([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
       return $user;
    }
}
