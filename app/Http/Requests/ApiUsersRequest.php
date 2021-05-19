<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class ApiUsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => Password::min(8)->letters()->mixedCase()->numbers()->symbols(),//->uncompromised(),
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute no debe estar vacío',
            'email.required' => 'El :attribute no debe estar vacío',
            'email.unique' => 'El :attribute ya está en uso',
            'email.email' => 'El :attribute debe ser un correo electrónico válido',
            'password.required' => 'La :attribute no debe estar en blanco',
            'password.min' => 'La :attribute debe tener por lo menos :min caracteres',
            'password_confirmation' => 'Debes confirmar tu contraseña'
        ];
    }

    public function attributes()
    {
        return
        [
            'name' => 'nombre de usuario',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
        ];
    }

}
