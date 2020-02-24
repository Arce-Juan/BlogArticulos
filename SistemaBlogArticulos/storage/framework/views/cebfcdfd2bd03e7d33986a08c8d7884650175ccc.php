<?php $__env->startSection('contenido'); ?>
<div class="row">
    <div class="col-12 col-md-8 col-lg-6 col-xl-3">
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Filtrar Por</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    
                </div>
            </div>
            <?php echo Form::Open(array('url'=>'blogArticulo/principal/buscarPorFiltro','method'=>'POST','autocomplete'=>'off', 'files'=>'false')); ?>

			<?php echo e(Form::token()); ?>

                <div class="box-body" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-3">
                                    Fecha
                                </div>
                                <select name="nSelectFecha" class="col-6 custom-select">
                                    <option value="desc">-elija-</option>
                                    <option value="desc">Mas recientes</option>
                                    <option value="asc">Mas antiguos</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    Relevancia
                                </div>
                                <select name="nSelectComentados" id="" class="col-6 custom-select">
                                    <option value="asc">-elija-</option>
                                    <option value="desc">Mas comentados</option>
                                    <option value="desc">Menos comentados</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    Autor
                                </div>
                                <select name="nSelectAutor" id="" class="col-6 custom-select">
                                    <option value="">-elija-</option>
                                    <?php foreach($autores as $aut): ?>
                                        <option value="<?php echo e($aut->name); ?>"><?php echo e($aut->name); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

<br>
<div class="row">
    <?php if(isset($tipoArticulo)): ?>
        <div class="col">
            Categoria <span class="badge badge-warning"><?php echo e($tipoArticulo->nombre); ?></span>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <div class="container">
        <div class="row" style="cursor: pointer">
            <?php if(count($articulos)==0): ?>
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    No hay noticias en esta sección
                </div>
            <?php endif; ?>
            <?php ($columnas = 1); ?>
            <?php foreach($articulos as $art): ?>
                <?php if($columnas < 5): ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card" onclick="verNoticia(<?php echo e($art->idArticulo); ?>);">
                            <img src="<?php echo e(asset('imagenes/articulos/' . $art->imagen)); ?>" height="150px" width="150px" class="card-img-top" alt="foto de sacha">
                            <div class="card-body">
                                <div class="badges">
                                    <span class="badge badge-warning"><?php echo e($art->nombre); ?></span>
                                    <span class="badge badge-info"><?php echo e($art->name); ?></span>
                                    <span class="badge badge-secondary"><?php echo e(substr($art->fechaPublicacion, 0, 10)); ?></span>
                                </div>
                                <h5 class="card-title"><?php echo e($art->titulo); ?></h5>
                                <p class="card-text"><?php echo e($art->cabecera); ?></p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php ($columnas = 1); ?>
                    </div>
                    <div class="row" style="cursor: pointer">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
    <script type="text/javascript">
        var verNoticia = function (id) {
            var url = "/blogArticulo/principal/" + id + "/edit";
            $(location).attr('href',url);
        };

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>