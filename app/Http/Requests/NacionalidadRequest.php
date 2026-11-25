<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NacionalidadRequest extends FormRequest
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
            'id_Nacionalidades' => 'required',
            'Descripcion' => 'required|min:5|max:50'
         
        ];
    }
    public function messages(){
        return[
            'id_Nacionalidades.required' => 'El campo codigo es requerido',
            'Descripcion.required' => 'El campo Descripcion es requerido',
            'Descripcion.min' => 'El campo Descripcion debe tener al menos 5 caracteres',
            'Descripcion.max' => 'El campo Descripcion no debe exceder los 50 caracteres'
        ];
    }

}

           
    


