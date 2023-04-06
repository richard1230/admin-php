<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //
    public function __invoke(RegisterRequest $request)
    {

        $accountField= filter_var($request->account,FILTER_VALIDATE_EMAIL)?'email':'mobile';
        $user = User::create([
            $accountField=>$request->account,
            'password'=>Hash::make($request->password),
        ]);
       return $user;
    }
}
