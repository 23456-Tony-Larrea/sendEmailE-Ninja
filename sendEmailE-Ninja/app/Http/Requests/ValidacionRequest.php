<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRequest extends FormRequest
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
            'nombres'=> 'required|min:3|max:150',
            'apellidos'=> 'required|min:3|max:150',
            'telefono'=> 'required|min:10|max:10|alpha_num',
            'correo'=> 'required|email:rfc,dns',
            'estado_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombres.*'=> 'Nombre debe tener 3 caracteres minimo y maximo 150',
            'apellidos.*'=> 'Apellidos debe tener 3 caracteres minimo y maximo 150',
            'telefono.*'=> 'Telefono debe tener sus 10 numeros',
            'correo.*'=> 'Correo debe tener un correo apropiado',
            'estado_id.required' => 'El estado es requerido'
        ];
    }
}
