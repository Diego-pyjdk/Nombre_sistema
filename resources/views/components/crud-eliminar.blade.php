<div class="modal fade" id="modalEliminarCrud" tabindex="-1" aria-labelledby="modalEliminarCrudTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h2 class="modal-title fs-5" id="modalEliminarCrudTitulo">Eliminar registro</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">¿Desea eliminar el registro <strong data-crud-registro></strong>?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
            </div>
        </form>
    </div>
</div>
