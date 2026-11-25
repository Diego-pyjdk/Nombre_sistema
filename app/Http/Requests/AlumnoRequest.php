<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class AlumnoRequest extends CrudRequest
{
    protected string $recurso = 'alumnos';

    public function rules(): array
    {
        $matriculaUnica = Rule::unique('alumnos', 'Matricula_Numero');
        if ($alumno = $this->route('alumno')) {
            $matriculaUnica->ignoreModel($alumno);
        }

        return [
            'Ci' => [Rule::excludeIf($alumno !== null), 'bail', 'required', 'integer', 'min:1', 'max:2147483647', 'unique:alumnos,Ci'],
            'Matricula_Numero' => $this->texto(20, $matriculaUnica),
            'Nombre' => $this->texto(50),
            'Apellido' => $this->texto(50),
            'Fecha_Nacimiento' => ['bail', 'required', 'date_format:Y-m-d', 'after_or_equal:1000-01-01', 'before_or_equal:today'],
            'Genero' => $this->texto(15),
            'Direccion' => $this->texto(150),
            'Correo_Electronico' => $this->texto(100, 'email'),
            'CIUDADES_id_Ciudades' => ['bail', 'required', 'integer', 'exists:ciudades,id_Ciudades'],
            'BECAS_id_Becas' => ['bail', 'required', 'integer', 'exists:becas,id_Becas'],
            'NACIONALIDADES_id_Nacionalidades' => ['bail', 'required', 'integer', 'exists:nacionalidades,id_Nacionalidades'],
        ];
    }

    public function attributes(): array
    {
        return [
            'Ci' => 'cédula',
            'Matricula_Numero' => 'número de matrícula',
            'Nombre' => 'nombre',
            'Apellido' => 'apellido',
            'Fecha_Nacimiento' => 'fecha de nacimiento',
            'Genero' => 'género',
            'Direccion' => 'dirección',
            'Correo_Electronico' => 'correo electrónico',
            'CIUDADES_id_Ciudades' => 'ciudad',
            'BECAS_id_Becas' => 'beca',
            'NACIONALIDADES_id_Nacionalidades' => 'nacionalidad',
        ];
    }

    public function messages(): array
    {
        return ['Fecha_Nacimiento.after_or_equal' => 'La fecha de nacimiento debe ser del año 1000 o posterior.'] + parent::messages();
    }
}
