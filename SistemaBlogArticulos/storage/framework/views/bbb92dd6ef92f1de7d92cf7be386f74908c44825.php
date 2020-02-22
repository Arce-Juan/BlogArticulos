<?php $__env->startSection('contenido'); ?>

<script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>

<style media="screen">
	#uploadForm,
	#imagePreview{
		width: 720px;
		margin: 0 auto;
	}

	img {
		max-width: 250px;
		height: auto;
	}
</style>

<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Articulo: <?php echo e($articulo->idArticulo); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			
			<?php echo Form::model($articulo,['method'=>'PATCH','route'=>['blogArticulo.articulo.update',$articulo->idArticulo], 'autocomplete'=>'off', 'files'=>'true']); ?>

            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="titulo">Titulo</label>
            	<input type="text" name="titulo" class="form-control" value="<?php echo e($articulo->titulo); ?>" placeholder="Titulo...">
            </div>
            <div class="form-group">
            	<label for="cabecera">Cabecera</label>
            	<input type="text" name="cabecera" class="form-control" value="<?php echo e($articulo->cabecera); ?>" placeholder="Cabecera...">
            </div>
            <div class="form-group">
            	<label for="cuerpo">Cuerpo</label>
            	<input type="text" name="cuerpo" class="form-control" value="<?php echo e($articulo->cuerpo); ?>" placeholder="Cuerpo...">
            </div>
            <div class="form-group">
            	<label for="imagen">Imagen</label>
				<input type="file" name="imagen" id="miImagen" class="form-control">
			</div>

			<div class="form-group">
				<div id="imagePreview" >
					<?php if(($articulo->imagen)!=""): ?>
						<img src="<?php echo e(asset('imagenes/articulos/' . $articulo->imagen)); ?>">
					<?php endif; ?>					
				</div>
			</div>

			<div class="form-group">
            	<label for="idTipoArticulo"></label>
				<select name="idTipoArticulo" id="id_idTipoArticulo" class="form-control">
					<?php foreach($tiposArticulos as $item): ?>
						<?php if($item->idTipoArticulo == $articulo->TipoArticulo_idTipoArticulo): ?>
							<option value="<?php echo e($item->idTipoArticulo); ?>" selected><?php echo e($item->nombre); ?></option>	
						<?php else: ?>
							<option value="<?php echo e($item->idTipoArticulo); ?>"><?php echo e($item->nombre); ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Editar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			<script type="text/javascript">
				(function(){
					function filePreview(input){
						if(input.files && input.files[0]){
							var reader = new FileReader();
							reader.onload = function(e){
								$('#imagePreview').html("<img src='" + e.target.result + "' />");
							}
							reader.readAsDataURL(input.files[0]);
						}
					}
					$('#miImagen').change(function(){
						filePreview(this);
					});
				})();
			</script>

			<?php echo Form::close(); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>