<?php

namespace App\Http\Controllers;

use App\Http\Requests\HorarioRequest;
use App\Models\Clase;
use App\Models\Horario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Horariocontroller extends Catalogocontroller
{
    protected string $recurso = 'horarios';

    protected string $vista = 'horario.index';

    protected string $nombre = 'Horario';

    public function index(Request $request): View
    {
        $texto = $this->texto($request);
        $registros = Horario::with('clase')
            ->where(function ($consulta) use ($texto) {
                $consulta->where('Dia_semana', 'like', '%'.$texto.'%')
                    ->orWhere('Turno', 'like', '%'.$texto.'%')
                    ->orWhereHas('clase', fn ($clase) => $clase->where('Codigo_Seccion', 'like', '%'.$texto.'%'));
            })
            ->orderByDesc((new Horario)->getKeyName())
            ->paginate(5)
            ->appends(['texto' => $texto]);

        return $this->pagina('index', null, $this->opciones() + compact('registros', 'texto'));
    }

    public function create(): View
    {
        return $this->pagina('crear', null, $this->opciones());
    }

    public function store(HorarioRequest $request): RedirectResponse
    {
        Horario::create($request->validated());

        return $this->confirmar('creado');
    }

    public function show(Horario $horario): View
    {
        return $this->pagina('mostrar', $horario->load('clase'));
    }

    public function edit(Horario $horario): View
    {
        return $this->pagina('editar', $horario, $this->opciones());
    }

    public function update(HorarioRequest $request, Horario $horario): RedirectResponse
    {
        $horario->update($request->validated());

        return $this->confirmar('actualizado');
    }

    public function destroy(Horario $horario): RedirectResponse
    {
        return $this->eliminar($horario);
    }

    private function opciones(): array
    {
        return [
            'clases' => Clase::orderBy('Codigo_Seccion')->orderBy('id_Clases')
                ->get(['id_Clases', 'Codigo_Seccion'])
                ->mapWithKeys(fn (Clase $clase) => [$clase->getKey() => $clase->Codigo_Seccion.' ('.$clase->getKey().')']),
        ];
    }
}
