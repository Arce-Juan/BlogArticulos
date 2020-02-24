<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
            <?php echo $__env->make('blogArticulo.articulo.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th scope="col">Titulo</th>
                        <th scope="col">Cabecera</th>
                        <th scope="col" class="d-none d-lg-block">Cuerpo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Escritor</th>
                        <th scope="col">-</th>
                    </thead>
                   <?php foreach($articulos as $art): ?>
                    <tr>
                        <td style="width: 110px;"><?php echo e(substr($art->titulo, 0, 25) . '..'); ?></td>
                        <td style="width: 110px;"><?php echo e(substr($art->cabecera, 0, 25) . '..'); ?></td>
                        <td class="d-none d-lg-block"><?php echo e($art->cuerpo); ?></td>
                        <td>
                            <img src="<?php echo e(asset('imagenes/articulos/' . $art->imagen)); ?>" alt="<?php echo e($art->titulo); ?>" height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td><?php echo e($art->nombre); ?></td>
                        <td><?php echo e($art->nickName); ?></td>
                        <td style="width: 110px;">
                            <a class="btn btn-info" href="<?php echo e(URL::action('ArticuloController@edit',$art->idArticulo)); ?>" role="button" title="Editar"><i class="fa fa-pencil"></i></a>
                            <?php if($art->activo == 1): ?>
                                <a class="btn btn-danger" href="" data-target="#modal-delete-<?php echo e($art->idArticulo); ?>" data-toggle="modal" title="Eliminar"><i class="fa fa-trash"></i></a>
                            <?php else: ?>
                                <a class="btn btn-secondary" href="" data-target="#modal-restore-<?php echo e($art->idArticulo); ?>" data-toggle="modal" title="Restablecer"><i class="fa fa-upload"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php echo $__env->make('blogArticulo.articulo.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php echo e($articulos->render()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>