<?php $__env->startSection('contenido'); ?>
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
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="card" onclick="verNoticia(<?php echo e($art->idArticulo); ?>);">
                            <img src="<?php echo e(asset('imagenes/articulos/' . $art->imagen)); ?>" height="150px" width="150px" class="card-img-top" alt="foto de sacha">
                            <div class="card-body">
                                <div class="badges">
                                    <span class="badge badge-warning"><?php echo e($art->nombre); ?></span>
                                    <span class="badge badge-info"><?php echo e($art->name); ?></span>
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
    <script type="text/javascript">
        var verNoticia = function (id) {
            var url = "/blogArticulo/principal/" + id + "/edit";
            $(location).attr('href',url);
            //var url = "principal/showDirectReferal";
            //$(location).attr('href',url);
            /*
            $.ajax({
                type:"method",
                url:"principal/buscar",
                data:{
                },
                success:function (data) {
                },error:function(jqXHR, textStatus, errorThrown){
                    console.log('error del coso este:: '+ errorThrown);
                }

            });
            */
            /*
            $.post('principal/55/edit', { }, function (data) {

            });
            */
            /*
            $.ajax({
                data: {},
                url: "principal/buscar",
                method: "POST",
                success: function(data) {
                    
                }
            });
            */
            //window.location="<?php echo e(URL::to('blogArticulo/principal/buscar')); ?>";
        };

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>