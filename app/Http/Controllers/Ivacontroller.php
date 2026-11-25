<?php

namespace App\Http\Controllers;

use App\Http\Requests\IvaRequest;
use App\Models\Iva;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Ivacontroller extends Catalogocontroller
{
    protected string $recurso = 'ivas';

    protected string $vista = 'iva.index';

    protected string $nombre = 'Registro de IVA';

    public function index(Request $request): View
    {
        $texto = $this->texto($request);
        $registros = Iva::query()->where('Descripcion_Iva', 'like', '%'.$texto.'%')
            ->orderByDesc((new Iva)->getKeyName())
            ->paginate(5)
            ->appends(['texto' => $texto]);

        return $this->pagina('index', null, compact('registros', 'texto'));
    }

    public function create(): View
    {
        return $this->pagina('crear');
    }

    public function store(IvaRequest $request): RedirectResponse
    {
        Iva::create($request->validated());

        return $this->confirmar('creado');
    }

    public function show(Iva $iva): View
    {
        return $this->pagina('mostrar', $iva);
    }

    public function edit(Iva $iva): View
    {
        return $this->pagina('editar', $iva);
    }

    public function update(IvaRequest $request, Iva $iva): RedirectResponse
    {
        $iva->update($request->validated());

        return $this->confirmar('actualizado');
    }

    public function destroy(Iva $iva): RedirectResponse
    {
        return $this->eliminar($iva);
    }
}
