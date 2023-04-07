<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //
    public function __invoke(RegisterRequest $request,UserService $userService)
    {

        $user = User::create([
            $userService->loginFieldName()=>$request->account,
            'password'=>Hash::make($request->password),
        ]);
        return [
            'user'=>$user,
            'token' => $user->createToken('author')->plainTextToken
        ];;
    }
}
