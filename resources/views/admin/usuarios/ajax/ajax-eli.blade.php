    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Esta seguro que desea eliminar al usuario {{ $usuario->username }}?</p>
    </div>
      <div class="modal-footer">
      	<a href="/admin/usuarios/destroy/<?php echo $usuario->id; ?>"><button type="button" class="btn btn-primary" id="btn-eliminar" data-id="{{ $usuario->id }}">Si</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
