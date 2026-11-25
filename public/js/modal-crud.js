const editorCrud = document.querySelector('[data-crud-editor]');

if (editorCrud && window.bootstrap?.Modal) {
    const formulario = editorCrud.querySelector('form');
    const titulo = editorCrud.querySelector('.modal-title');
    const cabecera = editorCrud.querySelector('.modal-header');
    const cerrar = editorCrud.querySelector('.btn-close');
    const guardar = formulario.querySelector('[type="submit"]');
    const metodo = formulario.elements.namedItem('_method');
    const campos = [...formulario.querySelectorAll('[data-crud-campo]')];

    editorCrud.addEventListener('shown.bs.modal', () => {
        const foco = formulario.querySelector('[aria-invalid="true"]') || campos.find((campo) => !campo.readOnly);
        foco?.focus();
    });

    document.querySelectorAll('[data-crud-abrir]').forEach((enlace) => {
        enlace.addEventListener('click', (evento) => {
            if (evento.ctrlKey || evento.metaKey || evento.shiftKey || evento.altKey) return;
            evento.preventDefault();

            const editar = enlace.hasAttribute('data-crud-editar');
            const valores = JSON.parse(enlace.dataset.crudValores || '{}');

            formulario.reset();
            formulario.action = enlace.dataset.crudAction;
            metodo.disabled = !editar;
            titulo.textContent = enlace.dataset.crudTitulo;
            cabecera.classList.toggle('bg-primary', !editar);
            cabecera.classList.toggle('text-white', !editar);
            cabecera.classList.toggle('bg-warning', editar);
            cabecera.classList.toggle('text-dark', editar);
            cerrar.classList.toggle('btn-close-white', !editar);
            guardar.classList.toggle('btn-primary', !editar);
            guardar.classList.toggle('btn-warning', editar);

            campos.forEach((campo) => {
                campo.value = valores[campo.name] ?? '';
                if (campo.hasAttribute('data-crud-fijo')) campo.readOnly = editar;
            });

            editorCrud.addEventListener('hidden.bs.modal', () => enlace.focus(), { once: true });
            bootstrap.Modal.getOrCreateInstance(editorCrud).show(enlace);
        });
    });

    if (editorCrud.hasAttribute('data-crud-reabrir')) {
        const volver = formulario.querySelector('[data-crud-volver]');
        editorCrud.classList.add('modal', 'fade');
        editorCrud.tabIndex = -1;
        editorCrud.querySelector('[data-crud-dialog]').classList.add('modal-dialog', 'modal-dialog-centered', 'modal-dialog-scrollable', 'modal-lg');
        editorCrud.addEventListener('hidden.bs.modal', () => window.location.assign(volver.href), { once: true });
        bootstrap.Modal.getOrCreateInstance(editorCrud).show();
    }
}

const eliminarCrud = document.getElementById('modalEliminarCrud');

eliminarCrud?.addEventListener('show.bs.modal', (evento) => {
    const boton = evento.relatedTarget;
    const formulario = eliminarCrud.querySelector('form');
    if (!boton?.dataset.crudAction) {
        evento.preventDefault();
        return;
    }

    formulario.action = boton.dataset.crudAction;
    formulario.querySelector('[data-crud-registro]').textContent = boton.dataset.crudRegistro;
    formulario.querySelector('[type="submit"]').disabled = false;
});
