@props(['campos', 'entidad' => null, 'editar' => false])

@foreach ($campos as $nombre => $campo)
    @php
        $tipo = $campo['tipo'] ?? 'text';
        $fijo = $campo['fijo'] ?? false;
        $valor = $errors->crud->any() && !($editar && $fijo)
            ? old($nombre, $entidad?->getAttribute($nombre))
            : $entidad?->getAttribute($nombre);
        $valor = is_scalar($valor) ? (string) $valor : '';
        $id = 'crud-'.$nombre;
        $invalido = $errors->crud->has($nombre);
    @endphp

    <div class="{{ $campo['ancho'] ?? 'col-12 col-md-6' }}">
        <label class="form-label" for="{{ $id }}">{{ $campo['etiqueta'] }}</label>

        @if ($tipo === 'select')
            <select id="{{ $id }}" name="{{ $nombre }}" @class(['form-select', 'is-invalid' => $invalido])
                data-crud-campo required @if ($invalido) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif>
                <option value="">Seleccione una opción</option>
                @foreach ($campo['opciones'] as $codigo => $etiqueta)
                    <option value="{{ $codigo }}" @selected((string) $codigo === $valor)>{{ $etiqueta }}</option>
                @endforeach
            </select>
        @elseif ($tipo === 'textarea')
            <textarea id="{{ $id }}" name="{{ $nombre }}" @class(['form-control', 'is-invalid' => $invalido])
                data-crud-campo rows="2" maxlength="{{ $campo['max'] }}" required
                @if ($invalido) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif>{{ $valor }}</textarea>
        @else
            <input id="{{ $id }}" name="{{ $nombre }}" type="{{ $tipo }}" value="{{ $valor }}"
                @class(['form-control', 'is-invalid' => $invalido]) data-crud-campo required
                @if ($fijo) data-crud-fijo @readonly($editar) @endif
                @if (isset($campo['max'])) {{ $tipo === 'number' ? 'max' : 'maxlength' }}="{{ $campo['max'] }}" @endif
                @if (isset($campo['min'])) min="{{ $campo['min'] }}" @endif
                @if (isset($campo['paso'])) step="{{ $campo['paso'] }}" @endif
                @if ($invalido) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif>
        @endif

        @error($nombre, 'crud')
            <div class="invalid-feedback" id="{{ $id }}-error">{{ $message }}</div>
        @enderror
    </div>
@endforeach
