@extends('plantilla.app')

@section('contenido')
    <x-crud-pagina recurso="horarios" titulo="Horarios" singular="horario" crear="Nuevo horario"
        :modo="$modo" :entidad="$entidad" :registros="$registros ?? null" :texto="$texto ?? ''"
        :campos="[
            'Dia_semana' => ['etiqueta' => 'Día de la semana', 'max' => 20],
            'Horario_Inicio' => ['etiqueta' => 'Hora de inicio', 'tipo' => 'time', 'paso' => 1],
            'Hora_Fin' => ['etiqueta' => 'Hora de fin', 'tipo' => 'time', 'paso' => 1],
            'Turno' => ['etiqueta' => 'Turno', 'max' => 20],
            'CLASES_id_Clases' => ['etiqueta' => 'Clase', 'tipo' => 'select', 'opciones' => $clases ?? [], 'mostrar' => 'clase.Codigo_Seccion'],
        ]" />
@endsection
