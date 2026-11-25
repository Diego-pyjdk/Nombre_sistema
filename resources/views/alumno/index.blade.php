@extends('plantilla.app')

@section('contenido')
    <x-crud-pagina recurso="alumnos" titulo="Alumnos" singular="alumno" crear="Nuevo alumno" codigo="Cédula" campo-codigo="Ci"
        :modo="$modo" :entidad="$entidad" :registros="$registros ?? null" :texto="$texto ?? ''"
        :campos="[
            'Ci' => ['etiqueta' => 'Cédula', 'tipo' => 'number', 'min' => 1, 'max' => 2147483647, 'fijo' => true],
            'Matricula_Numero' => ['etiqueta' => 'Número de matrícula', 'max' => 20],
            'Nombre' => ['etiqueta' => 'Nombre', 'max' => 50],
            'Apellido' => ['etiqueta' => 'Apellido', 'max' => 50],
            'Fecha_Nacimiento' => ['etiqueta' => 'Fecha de nacimiento', 'tipo' => 'date', 'min' => '1000-01-01'],
            'Genero' => ['etiqueta' => 'Género', 'max' => 15],
            'Direccion' => ['etiqueta' => 'Dirección', 'max' => 150],
            'Correo_Electronico' => ['etiqueta' => 'Correo electrónico', 'tipo' => 'email', 'max' => 100],
            'CIUDADES_id_Ciudades' => ['etiqueta' => 'Ciudad', 'tipo' => 'select', 'opciones' => $ciudades ?? [], 'mostrar' => 'ciudad.Nombre_Ciudad'],
            'BECAS_id_Becas' => ['etiqueta' => 'Beca', 'tipo' => 'select', 'opciones' => $becas ?? [], 'mostrar' => 'beca.Nombre_Beca'],
            'NACIONALIDADES_id_Nacionalidades' => ['etiqueta' => 'Nacionalidad', 'tipo' => 'select', 'opciones' => $nacionalidades ?? [], 'mostrar' => 'nacionalidad.Descripcion'],
        ]" />
@endsection
