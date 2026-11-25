@extends('plantilla.app')

@section('contenido')
    <x-crud-pagina recurso="ivas" titulo="IVA" singular="IVA" crear="Nuevo registro de IVA"
        :modo="$modo" :entidad="$entidad" :registros="$registros ?? null" :texto="$texto ?? ''"
        :campos="[
            'Descripcion_Iva' => ['etiqueta' => 'Descripción', 'max' => 50],
            'Porcentaje' => ['etiqueta' => 'Porcentaje', 'tipo' => 'number', 'min' => 0, 'max' => 100, 'paso' => '0.01', 'sufijo' => '%'],
        ]" />
@endsection
