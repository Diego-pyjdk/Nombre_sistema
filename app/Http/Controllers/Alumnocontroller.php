<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Models\Alumno;
use App\Models\Beca;
use App\Models\Ciudad;
use App\Models\Nacionalidad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Alumnocontroller extends Catalogocontroller
{
    protected string $recurso = 'alumnos';

    protected string $vista = 'alumno.index';

    protected string $nombre = 'Alumno';

    public function index(Request $request): View
    {
        $texto = $this->texto($request);
        $registros = Alumno::with(['ciudad', 'beca', 'nacionalidad'])
            ->where(function ($consulta) use ($texto) {
                $consulta->where('Nombre', 'like', '%'.$texto.'%')
                    ->orWhere('Apellido', 'like', '%'.$texto.'%')
                    ->orWhere('Matricula_Numero', 'like', '%'.$texto.'%')
                    ->orWhere('Ci', 'like', '%'.$texto.'%');
            })
            ->orderByDesc((new Alumno)->getKeyName())
            ->paginate(5)
            ->appends(['texto' => $texto]);

        return $this->pagina('index', null, $this->opciones() + compact('registros', 'texto'));
    }

    public function create(): View
    {
        return $this->pagina('crear', null, $this->opciones());
    }

    public function store(AlumnoRequest $request): RedirectResponse
    {
        Alumno::create($request->validated());

        return $this->confirmar('creado');
    }

    public function show(Alumno $alumno): View
    {
        return $this->pagina('mostrar', $alumno->load(['ciudad', 'beca', 'nacionalidad']));
    }

    public function edit(Alumno $alumno): View
    {
        return $this->pagina('editar', $alumno, $this->opciones());
    }

    public function update(AlumnoRequest $request, Alumno $alumno): RedirectResponse
    {
        $alumno->update($request->validated());

        return $this->confirmar('actualizado');
    }

    public function destroy(Alumno $alumno): RedirectResponse
    {
        return $this->eliminar($alumno);
    }

    private function opciones(): array
    {
        return [
            'ciudades' => Ciudad::orderBy('Nombre_Ciudad')->pluck('Nombre_Ciudad', 'id_Ciudades'),
            'becas' => Beca::orderBy('Nombre_Beca')->pluck('Nombre_Beca', 'id_Becas'),
            'nacionalidades' => Nacionalidad::orderBy('Descripcion')->pluck('Descripcion', 'id_Nacionalidades'),
        ];
    }
}
