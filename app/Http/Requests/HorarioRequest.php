<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class HorarioRequest extends CrudRequest
{
    protected string $recurso = 'horarios';

    protected function prepareForValidation(): void
    {
        foreach (['Horario_Inicio', 'Hora_Fin'] as $campo) {
            $hora = $this->input($campo);
            if (is_string($hora) && preg_match('/^\d{2}:\d{2}$/D', $hora)) {
                $this->merge([$campo => $hora.':00']);
            }
        }
    }

    public function rules(): array
    {
        $horaUnica = Rule::unique('horarios', 'Horario_Inicio')
            ->where('Dia_semana', $this->textoParaRegla('Dia_semana'))
            ->where('CLASES_id_Clases', $this->integer('CLASES_id_Clases'));
        if ($horario = $this->route('horario')) {
            $horaUnica->ignoreModel($horario);
        }

        return [
            'Dia_semana' => $this->texto(20),
            'Horario_Inicio' => ['bail', 'required', 'date_format:H:i:s', $horaUnica],
            'Hora_Fin' => ['bail', 'required', 'date_format:H:i:s', 'after:Horario_Inicio'],
            'Turno' => $this->texto(20),
            'CLASES_id_Clases' => ['bail', 'required', 'integer', 'exists:clases,id_Clases'],
        ];
    }

    public function attributes(): array
    {
        return [
            'Dia_semana' => 'día de la semana',
            'Horario_Inicio' => 'hora de inicio',
            'Hora_Fin' => 'hora de fin',
            'Turno' => 'turno',
            'CLASES_id_Clases' => 'clase',
        ];
    }

    public function messages(): array
    {
        return [
            'Horario_Inicio.unique' => 'Esa clase ya tiene un horario con el mismo día y hora de inicio.',
            'Hora_Fin.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
        ] + parent::messages();
    }
}
