<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

abstract class CrudRequest extends FormRequest
{
    private const CARACTERES_NO_ADMITIDOS = '/[\x{10000}-\x{10FFFF}]/u';

    protected $errorBag = 'crud';

    protected string $recurso;

    public function authorize(): bool
    {
        return true;
    }

    protected function texto(int $maximo, string|Unique ...$reglas): array
    {
        return ['bail', 'required', 'string', 'max:'.$maximo, 'not_regex:'.self::CARACTERES_NO_ADMITIDOS, ...$reglas];
    }

    protected function textoParaRegla(string $campo): ?string
    {
        $valor = $this->input($campo);

        return is_string($valor) && preg_match(self::CARACTERES_NO_ADMITIDOS, $valor) === 0 ? $valor : null;
    }

    protected function getRedirectUrl(): string
    {
        $ruta = $this->route();

        return $ruta->named($this->recurso.'.update')
            ? route($this->recurso.'.edit', $ruta->parameters())
            : route($this->recurso.'.create');
    }

    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser un texto.',
            'not_regex' => 'El campo :attribute contiene caracteres que la base de datos no admite.',
            'unique' => 'El valor de :attribute ya está registrado.',
            'max' => [
                'string' => 'El campo :attribute no puede superar :max caracteres.',
                'numeric' => 'El campo :attribute no puede ser mayor que :max.',
            ],
            'min' => 'El campo :attribute debe ser como mínimo :min.',
            'exists' => 'El valor seleccionado para :attribute no existe.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'decimal' => 'El campo :attribute debe tener como máximo dos decimales.',
            'email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'date_format' => 'El formato del campo :attribute no es válido.',
            'before_or_equal' => 'El campo :attribute no puede ser una fecha futura.',
        ];
    }
}
