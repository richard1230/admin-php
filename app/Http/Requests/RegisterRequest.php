<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'account'=>$this->accountRule(),
            'password'=>['required','min:6','confirmed'],
        ];
    }

    protected function accountRule(){
        if (filter_var(request('account'),FILTER_VALIDATE_EMAIL)){
                return ['required','email','unique:users,email'];
        }
        return ['required','regex:/^\d{11}$/','unique:users,mobile'];
    }
}
