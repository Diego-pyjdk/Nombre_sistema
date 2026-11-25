<?php

namespace App\Http\Controllers;

use App\Http\Requests\BecaRequest;
use App\Models\Beca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Becacontroller extends Catalogocontroller
{
    protected string $recurso = 'becas';

    protected string $vista = 'beca.index';

    protected string $nombre = 'Registro de beca';

    public function index(Request $request): View
    {
        $texto = $this->texto($request);
        $registros = Beca::query()->where('Nombre_Beca', 'like', '%'.$texto.'%')
            ->orderByDesc((new Beca)->getKeyName())
            ->paginate(5)
            ->appends(['texto' => $texto]);

        return $this->pagina('index', null, compact('registros', 'texto'));
    }

    public function create(): View
    {
        return $this->pagina('crear');
    }

    public function store(BecaRequest $request): RedirectResponse
    {
        Beca::create($request->validated());

        return $this->confirmar('creado');
    }

    public function show(Beca $beca): View
    {
        return $this->pagina('mostrar', $beca);
    }

    public function edit(Beca $beca): View
    {
        return $this->pagina('editar', $beca);
    }

    public function update(BecaRequest $request, Beca $beca): RedirectResponse
    {
        $beca->update($request->validated());

        return $this->confirmar('actualizado');
    }

    public function destroy(Beca $beca): RedirectResponse
    {
        return $this->eliminar($beca);
    }
}
