@props(['recurso', 'titulo', 'singular', 'crear', 'codigo' => 'ID', 'campoCodigo' => '', 'campos', 'modo', 'entidad' => null, 'registros' => null, 'texto' => ''])

@php
    $indice = route($recurso.'.index');
    $listado = $modo === 'index';
    $editar = $modo === 'editar';
    $detalle = $modo === 'mostrar';
    $tituloEditar = 'Editar '.$singular;
    $columnas = $campos;
    unset($columnas[$campoCodigo]);
@endphp

<div class="app-content">
    <div class="container-fluid">
        @if ($listado)
            <div class="card mb-4">
                <div class="card-header"><h1 class="card-title">{{ $titulo }}</h1></div>

                <div class="card-body">
                    @if (session('mensaje'))
                        <div class="alert alert-success" role="status">{{ session('mensaje') }}</div>
                    @endif
                    @if (session('errorCrud'))
                        <div class="alert alert-danger" role="alert">{{ session('errorCrud') }}</div>
                    @endif

                    <div class="d-flex flex-wrap gap-2 align-items-start justify-content-between mb-3">
                        <form action="{{ $indice }}" method="GET" class="input-group w-auto">
                            <label for="texto" class="visually-hidden">Buscar en {{ $titulo }}</label>
                            <input id="texto" name="texto" type="search" class="form-control" value="{{ $texto }}"
                                placeholder="Buscar en {{ $titulo }}">
                            <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                        </form>
                        <a href="{{ route($recurso.'.create') }}" class="btn btn-primary" data-crud-abrir
                            data-crud-titulo="{{ $crear }}" data-crud-action="{{ route($recurso.'.store') }}">
                            <i class="bi bi-plus-lg" aria-hidden="true"></i> Nuevo
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Opciones</th>
                                    <th scope="col">{{ $codigo }}</th>
                                    @foreach ($columnas as $campo)
                                        <th scope="col">{{ $campo['etiqueta'] }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($registros as $registro)
                                    <tr>
                                        <td class="text-nowrap">
                                            <a href="{{ route($recurso.'.show', $registro) }}" class="btn btn-outline-secondary btn-sm"
                                                aria-label="Ver {{ $singular }} {{ $registro->getKey() }}" title="Ver detalle">
                                                <i class="bi bi-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route($recurso.'.edit', $registro) }}" class="btn btn-warning btn-sm"
                                                aria-label="Editar {{ $singular }} {{ $registro->getKey() }}" title="Editar"
                                                data-crud-abrir data-crud-editar data-crud-titulo="{{ $tituloEditar }}"
                                                data-crud-action="{{ route($recurso.'.update', $registro) }}"
                                                data-crud-valores="{{ json_encode($registro->only(array_keys($campos)), JSON_THROW_ON_ERROR) }}">
                                                <i class="bi bi-pencil-fill" aria-hidden="true"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEliminarCrud" data-crud-action="{{ route($recurso.'.destroy', $registro) }}"
                                                data-crud-registro="{{ $singular }} {{ $registro->getKey() }}"
                                                aria-label="Eliminar {{ $singular }} {{ $registro->getKey() }}" title="Eliminar">
                                                <i class="bi bi-trash-fill" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <th scope="row">{{ $registro->getKey() }}</th>
                                        @foreach ($columnas as $nombre => $campo)
                                            <td>{{ data_get($registro, $campo['mostrar'] ?? $nombre) ?? '—' }}{{ $campo['sufijo'] ?? '' }}</td>
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr><td colspan="{{ 2 + count($columnas) }}">No se encontraron registros.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($registros->hasPages())
                    <div class="card-footer">{{ $registros->links() }}</div>
                @endif
            </div>

            <x-crud-eliminar />
        @elseif ($detalle)
            <div class="card mb-4">
                <div class="card-header"><h1 class="card-title">Detalle de {{ $singular }}</h1></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">{{ $codigo }}</dt>
                        <dd class="col-sm-8">{{ $entidad->getKey() }}</dd>
                        @foreach ($columnas as $nombre => $campo)
                            <dt class="col-sm-4">{{ $campo['etiqueta'] }}</dt>
                            <dd class="col-sm-8">{{ data_get($entidad, $campo['mostrar'] ?? $nombre) ?? '—' }}{{ $campo['sufijo'] ?? '' }}</dd>
                        @endforeach
                    </dl>
                </div>
                <div class="card-footer d-flex gap-2">
                    <a href="{{ $indice }}" class="btn btn-outline-secondary">Volver al listado</a>
                    <a href="{{ route($recurso.'.edit', $entidad) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        @endif

        @unless ($detalle)
            <x-modal-crud :action="$editar ? route($recurso.'.update', $entidad) : route($recurso.'.store')"
                :titulo="$editar ? $tituloEditar : $crear" :volver="$indice" :editar="$editar" :en-pagina="!$listado">
                <x-crud-campos :campos="$campos" :entidad="$entidad" :editar="$editar" />
            </x-modal-crud>
        @endunless
    </div>
</div>
