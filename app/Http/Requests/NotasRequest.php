<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotasRequest extends FormRequest
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
            'titulo' => 'required',
            'extracto' => 'required',
            'contenido' => 'required',
            //'slug' => 'required',
            'imagen_destacada' => 'required',
            'fecha' => 'required',
            'estatus' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo:atribute no debe estar vacío',
            'extracto.required' => 'El campo:atribute no debe estar vacío',
            'contenido.required' => 'El campo:atribute no debe estar vacío',
            'imagen_destacada.required' => 'El campo:atribute no debe estar vacío',
            'fecha.required' => 'El campo:atribute no debe estar vacío',
            'estatus.required' => 'El campo:atribute no debe estar vacío',
        ];
    }

    public function attributes()
    {
        return [
            'titulo' => 'título de la nota',
            'extracto' => 'extracto',
            'contenido' => 'contenido',
            //'slug' => 'required',
            'imagen_destacada' => 'imagen destacada',
            'fecha' => 'fecha de publicación',
            'estatus' => 'estatus de la nota',
        ];
    }
}
