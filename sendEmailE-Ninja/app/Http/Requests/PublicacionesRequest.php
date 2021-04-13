<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionesRequest extends FormRequest
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
            'nombre'=> 'required|min:3|max:150',
            'email'=> 'required|email:rfc,dns',
            'tituloEvento'=> 'required|min:2|max:150',
            'tematicaEvento'=> 'required|min:2|max:150',
            'descripcionEvento'=> 'required',
            'enlaceEvento' => 'required',
            'fecha'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.*'=> 'Nombre debe tener 3 caracteres minimo y maximo 150',
            'email.*'=> 'Correo debe tener un correo apropiado',
            'tituloEvento.*'=> 'Titulo debe tener 2 caracteres minimo y maximo 150',
            'tematicaEvento.*'=> 'Titulo debe tener 2 caracteres minimo y maximo 150',
            'enlaceEvento.required' => 'El Enlace es requerido',
            'fecha.required' => 'El Enlace es requerido',
            'descripcionEvento'=> 'Este campo es requerido'
        ];
    }
}
