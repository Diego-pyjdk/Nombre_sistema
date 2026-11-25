@extends('plantilla.app')

@section('contenido')
    <x-crud-pagina recurso="becas" titulo="Becas" singular="beca" crear="Nueva beca"
        :modo="$modo" :entidad="$entidad" :registros="$registros ?? null" :texto="$texto ?? ''"
        :campos="[
            'Nombre_Beca' => ['etiqueta' => 'Nombre', 'max' => 50],
            'Porcentaje_Descuento' => ['etiqueta' => 'Descuento', 'tipo' => 'number', 'min' => 0, 'max' => 100, 'paso' => '0.01', 'sufijo' => '%'],
            'Tipo_Beca' => ['etiqueta' => 'Tipo', 'max' => 50],
            'Requisitos' => ['etiqueta' => 'Requisitos', 'tipo' => 'textarea', 'max' => 100, 'ancho' => 'col-12'],
        ]" />
@endsection
