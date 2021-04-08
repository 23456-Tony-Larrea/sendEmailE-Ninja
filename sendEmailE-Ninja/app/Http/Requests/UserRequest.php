<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|min:3|max:150',
            'email'=> 'required|email:rfc,dns',
            'password'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.*'=> 'Nombre debe tener 3 caracteres minimo y maximo 150',
            'email.*'=> 'Apellidos debe tener 3 caracteres minimo y maximo 150',
            'password.required'=> 'Correo debe tener un correo apropiado'
        ];
    }
}
