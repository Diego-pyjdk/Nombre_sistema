<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CursoRequest extends CrudRequest
{
    protected string $recurso = 'cursos';

    public function rules(): array
    {
        $nombreUnico = Rule::unique('cursos', 'Nombre_Curso')
            ->where('Nivel_Anio', $this->textoParaRegla('Nivel_Anio'))
            ->where('Turno', $this->textoParaRegla('Turno'));
        if ($curso = $this->route('curso')) {
            $nombreUnico->ignoreModel($curso);
        }

        return [
            'Nombre_Curso' => $this->texto(100, $nombreUnico),
            'Nivel_Anio' => $this->texto(30),
            'Turno' => $this->texto(30),
            'Cupo_Maximo' => ['bail', 'required', 'integer', 'min:0', 'max:2147483647'],
        ];
    }

    public function attributes(): array
    {
        return [
            'Nombre_Curso' => 'nombre del curso',
            'Nivel_Anio' => 'nivel o año',
            'Turno' => 'turno',
            'Cupo_Maximo' => 'cupo máximo',
        ];
    }

    public function messages(): array
    {
        return ['Nombre_Curso.unique' => 'Ya existe un curso con ese nombre, nivel y turno.'] + parent::messages();
    }
}
