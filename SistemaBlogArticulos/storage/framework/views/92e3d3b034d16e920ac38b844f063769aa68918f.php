<?php $__env->startSection('contenido'); ?>
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

            <?php echo Form::model($articulo,['method'=>'POST','route'=>['articulo.update',$articulo->idarticulo]]); ?>

            <?php echo e(Form::token()); ?>


            <div class="form-group">
                <label for="idArticulo">Id</label>
            	<input type="text" name="idArticulo" class="form-control" value="<?php echo e($articulo->idArticulo); ?>">
            </div>
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
            	<input type="text" name="imagen" class="form-control" value="<?php echo e($articulo->imagen); ?>" placeholder="Imagen...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Editar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			<?php echo Form::close(); ?>


		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>