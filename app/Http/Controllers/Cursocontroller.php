<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Cursocontroller extends Catalogocontroller
{
    protected string $recurso = 'cursos';

    protected string $vista = 'curso.index';

    protected string $nombre = 'Curso';

    public function index(Request $request): View
    {
        $texto = $this->texto($request);
        $registros = Curso::query()->where('Nombre_Curso', 'like', '%'.$texto.'%')
            ->orderByDesc((new Curso)->getKeyName())
            ->paginate(5)
            ->appends(['texto' => $texto]);

        return $this->pagina('index', null, compact('registros', 'texto'));
    }

    public function create(): View
    {
        return $this->pagina('crear');
    }

    public function store(CursoRequest $request): RedirectResponse
    {
        Curso::create($request->validated());

        return $this->confirmar('creado');
    }

    public function show(Curso $curso): View
    {
        return $this->pagina('mostrar', $curso);
    }

    public function edit(Curso $curso): View
    {
        return $this->pagina('editar', $curso);
    }

    public function update(CursoRequest $request, Curso $curso): RedirectResponse
    {
        $curso->update($request->validated());

        return $this->confirmar('actualizado');
    }

    public function destroy(Curso $curso): RedirectResponse
    {
        return $this->eliminar($curso);
    }
}
