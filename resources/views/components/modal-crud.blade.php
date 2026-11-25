@props(['action', 'titulo', 'volver', 'editar' => false, 'enPagina' => false])

<div id="modalCrud" @class(['modal fade' => !$enPagina]) aria-labelledby="modalCrudTitulo"
    @if (!$enPagina) tabindex="-1" aria-hidden="true" @endif
    data-crud-editor @if ($enPagina && $errors->crud->any()) data-crud-reabrir @endif>
    <div @class(['modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg' => !$enPagina]) data-crud-dialog>
        <form id="formCrud" action="{{ $action }}" method="POST" class="modal-content card shadow-sm">
            @csrf
            <input type="hidden" name="_method" value="PUT" @disabled(!$editar)>

            <div @class(['modal-header card-header', 'bg-primary text-white' => !$editar, 'bg-warning text-dark' => $editar])>
                <h2 class="modal-title fs-5" id="modalCrudTitulo">{{ $titulo }}</h2>
                @unless ($enPagina)
                    <button type="button" @class(['btn-close', 'btn-close-white' => !$editar])
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                @endunless
            </div>

            <div class="modal-body card-body">
                <div class="row g-3">{{ $slot }}</div>
            </div>

            <div class="modal-footer card-footer d-flex justify-content-end gap-2">
                @if ($enPagina)
                    <a href="{{ $volver }}" class="btn btn-outline-secondary" data-crud-volver>Cancelar</a>
                @else
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                @endif
                <button type="submit" @class(['btn', 'btn-primary' => !$editar, 'btn-warning' => $editar])>Guardar</button>
            </div>
        </form>
    </div>
</div>
