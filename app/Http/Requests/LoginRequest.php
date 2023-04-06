<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'account'=>$this->accountRule(),
            'password'=>['required','min:6'],
        ];
    }

    protected function accountRule(){
        if (filter_var(request('account'),FILTER_VALIDATE_EMAIL)){
            return ['required','email'];
        }
        return ['required','regex:/^\d{11}$/'];
    }
}
