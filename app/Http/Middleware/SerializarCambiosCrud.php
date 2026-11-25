<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SerializarCambiosCrud
{
    public function handle(Request $request, Closure $next): Response
    {
        $conexion = DB::connection();
        $recurso = Str::beforeLast($request->route()->getName(), '.');
        $llave = hash('sha256', $conexion->getDatabaseName().':crud:'.$recurso);

        // El mismo bloqueo abarca la validación de unicidad y la escritura.
        $bloqueo = $conexion->selectOne('SELECT GET_LOCK(?, 5) AS obtenido', [$llave], false);
        abort_unless((int) $bloqueo->obtenido === 1, 503, 'El recurso está ocupado. Intente de nuevo.', ['Retry-After' => '1']);

        try {
            return $next($request);
        } finally {
            $conexion->selectOne('SELECT RELEASE_LOCK(?)', [$llave], false);
        }
    }
}
