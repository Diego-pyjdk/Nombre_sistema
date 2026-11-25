<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CiudadRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_Ciudades' => 'required',
            'Nombre_Ciudad' => 'required|min:5|max:100',
            'Departamento' => 'required|min:5|max:100'
        ];
    }
    public function messages(){
        return[
            'id_Ciudades.required' => 'El campo codigo es requerido',
            'Nombre_Ciudad.required' => 'El campo Nombre_Ciudad es requerido',
            'Nombre_Ciudad.min' => 'El campo Nombre_Ciudad debe tener al menos 5 caracteres',
            'Nombre_Ciudad.max' => 'El campo Nombre_Ciudad no debe exceder los 100 caracteres',
            'Departamento.required' => 'El campo Departamento es requerido',
            'Departamento.min' => 'El campo Departamento debe tener al menos 5 caracteres',
            'Departamento.max' => 'El campo Departamento no debe exceder los 100 caracteres'
        ];
    }
}
