@extends('plantilla.app')

@section('contenido')
    <x-crud-pagina recurso="cursos" titulo="Cursos" singular="curso" crear="Nuevo curso"
        :modo="$modo" :entidad="$entidad" :registros="$registros ?? null" :texto="$texto ?? ''"
        :campos="[
            'Nombre_Curso' => ['etiqueta' => 'Nombre', 'max' => 100],
            'Nivel_Anio' => ['etiqueta' => 'Nivel o año', 'max' => 30],
            'Turno' => ['etiqueta' => 'Turno', 'max' => 30],
            'Cupo_Maximo' => ['etiqueta' => 'Cupo máximo', 'tipo' => 'number', 'min' => 0, 'max' => 2147483647],
        ]" />
@endsection
