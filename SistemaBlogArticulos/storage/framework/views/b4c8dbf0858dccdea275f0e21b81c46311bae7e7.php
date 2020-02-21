<?php $__env->startSection('contenido'); ?>

<script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>

<div class="container">
	<div class="row bg-primary">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        	<h1><?php echo e(strtoupper($articulo->titulo)); ?></h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><?php echo e($articulo->cabecera); ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="badges">
				Categoria <span class="badge badge-warning"><?php echo e($tipoArticulo->nombre); ?></span>
				<br>
				Escrito por <span class="badge badge-info"><?php echo e($autor->name); ?></span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			Publicado: 2015-15-15
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<img src="<?php echo e(asset('imagenes/articulos/' . $articulo->imagen)); ?>" alt="<?php echo e($articulo->titulo); ?>" class="img-thumbnail">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?php echo e($articulo->cuerpo); ?>

		</div>
	</div>
	<br>
	<hr style="color: #0056b2;" />
	<br>

	<div class="row bg-info">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h5>Comentarios</h5>
		</div>
	</div>

	<?php foreach($comentarios as $com): ?>
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="<?php echo e(asset('imagenes/usuarios/usuario1.jpg')); ?>" class="card-img"  alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?php echo e($com->nickName); ?></h5>
						<p class="card-text"><?php echo e($com->detalle); ?></p>
						<p class="card-text"><small class="text-muted"><?php echo e($com->fechaHora); ?></small></p>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>