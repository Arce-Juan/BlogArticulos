<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Articulo</h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?php echo Form::open(array('url'=>'blogArticulo/articulo','method'=>'POST','autocomplete'=>'off', 'files'=>'true')); ?>

            <?php echo e(Form::token()); ?>

            <div class="form-group">
            	<label for="titulo">Titulo</label>
            	<input type="text" name="titulo" class="form-control" placeholder="Titulo...">
            </div>
            <div class="form-group">
            	<label for="cabecera">Cabecera</label>
            	<textarea name="cabecera" rows="2" class="form-control" placeholder="Cabecera..."></textarea>
            </div>
            <div class="form-group">
				<label for="cuerpo">Cuerpo</label>
				<textarea name="cuerpo" rows="5" class="form-control" placeholder="Cuerpo..."></textarea>
            </div>
            <div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control">
			</div>
			<div class="form-group">
            	<label for="idTipoArticulo"></label>
				<select name="idTipoArticulo" class="form-control">
					<?php foreach($tiposArticulos as $item): ?>
						<option value="<?php echo e($item->idTipoArticulo); ?>"><?php echo e($item->nombre); ?></option>
					<?php endforeach; ?>
				</select>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			<?php echo Form::close(); ?>


		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>