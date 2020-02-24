<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-<?php echo e($art->idArticulo); ?>">
	<?php echo e(Form::Open(array('action'=>array('ArticuloController@destroy',$art->idArticulo),'method'=>'delete'))); ?>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Eliminar Articulo?</h4>
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Articulo</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	<?php echo e(Form::Close()); ?>


</div>

<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-restore-<?php echo e($art->idArticulo); ?>">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Restablecer Articulo?</h4>
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                
			</div>
			<div class="modal-body">
				<p>Confirme si desea Restablecer el Articulo</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<!--
				<button type="submit" class="btn btn-primary">Confirmar</button>
				-->
				<button onclick="window.location.href = '/blogArticulo/articulo/restore/<?php echo e($art->idArticulo); ?>'" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	

</div>
