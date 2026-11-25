<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class BecaRequest extends CrudRequest
{
    protected string $recurso = 'becas';

    public function rules(): array
    {
        $nombreUnico = Rule::unique('becas', 'Nombre_Beca');
        if ($beca = $this->route('beca')) {
            $nombreUnico->ignoreModel($beca);
        }

        return [
            'Nombre_Beca' => $this->texto(50, $nombreUnico),
            'Porcentaje_Descuento' => ['bail', 'required', 'numeric', 'decimal:0,2', 'min:0', 'max:100'],
            'Tipo_Beca' => $this->texto(50),
            'Requisitos' => $this->texto(100),
        ];
    }

    public function attributes(): array
    {
        return [
            'Nombre_Beca' => 'nombre de la beca',
            'Porcentaje_Descuento' => 'porcentaje de descuento',
            'Tipo_Beca' => 'tipo de beca',
            'Requisitos' => 'requisitos',
        ];
    }
}
