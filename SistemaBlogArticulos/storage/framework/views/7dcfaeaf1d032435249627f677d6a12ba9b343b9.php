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
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Cabecera</th>
                        <th>Cuerpo</th>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Escritor</th>
                    </thead>
                   <?php foreach($articulos as $art): ?>
                    <tr>
                        <td><?php echo e($art->idArticulo); ?></td>
                        <td><?php echo e($art->titulo); ?></td>
                        <td><?php echo e($art->cabecera); ?></td>
                        <td><?php echo e($art->cuerpo); ?></td>
                        <td>
                            <img src="<?php echo e(asset('imagenes/articulos/' . $art->imagen)); ?>" alt="<?php echo e($art->titulo); ?>" height="100px" width="100px" class="img-thumbnail">
                            
                        </td>
                        <td><?php echo e($art->nombre); ?></td>
                        <td><?php echo e($art->nickName); ?></td>
                        <td>
                            <a href="<?php echo e(URL::action('ArticuloController@edit',$art->idArticulo)); ?>"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-<?php echo e($art->idArticulo); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
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