<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

abstract class Catalogocontroller extends Controller
{
    protected string $recurso;

    protected string $vista;

    protected string $nombre;

    protected function pagina(string $modo, ?Model $entidad = null, array $datos = []): View
    {
        return view($this->vista, compact('modo', 'entidad') + $datos);
    }

    protected function texto(Request $request): string
    {
        $texto = $request->query('texto', '');

        return is_string($texto) ? $texto : '';
    }

    protected function confirmar(string $operacion): RedirectResponse
    {
        return to_route($this->recurso.'.index')->with('mensaje', $this->nombre.' '.$operacion.' correctamente.');
    }

    protected function eliminar(Model $entidad): RedirectResponse
    {
        try {
            $entidad->delete();
        } catch (QueryException $exception) {
            if ($entidad->getConnection()->getDriverName() !== 'mysql' || (int) ($exception->errorInfo[1] ?? 0) !== 1451) {
                throw $exception;
            }

            return to_route($this->recurso.'.index')->with('errorCrud', 'El registro está vinculado a otros datos y no se puede eliminar.');
        }

        return $this->confirmar('eliminado');
    }
}
