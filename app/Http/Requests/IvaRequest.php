<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class IvaRequest extends CrudRequest
{
    protected string $recurso = 'ivas';

    public function rules(): array
    {
        $descripcionUnica = Rule::unique('ivas', 'Descripcion_Iva');
        if ($iva = $this->route('iva')) {
            $descripcionUnica->ignoreModel($iva);
        }

        return [
            'Descripcion_Iva' => $this->texto(50, $descripcionUnica),
            'Porcentaje' => ['bail', 'required', 'numeric', 'decimal:0,2', 'min:0', 'max:100'],
        ];
    }

    public function attributes(): array
    {
        return [
            'Descripcion_Iva' => 'descripción del IVA',
            'Porcentaje' => 'porcentaje',
        ];
    }
}
