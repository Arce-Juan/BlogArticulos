<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Blog de Noticias | Galvan Jose & Arce Juan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('css/_all-skins.min.css')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('img/apple-touch-icon.png')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <?php
      
    ?>
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/blogArticulo/principal" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>ArGa</b>AG</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Blog de Articulos</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                     <span class="hidden-xs"><?php echo e(auth()->user()->name); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="height: 150px">
                    
                    <div class="card text-white bg-secondary mb-3"  style="background-color: #222d32!important;max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4" >
                            <img src="<?php echo e(asset('/imagenes/usuarios/' . auth()->user()->imagen)); ?>" class="card-img"  alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo e(auth()->user()->name); ?></h5>
                              <p class="card-text"><?php echo e(auth()->user()->apellido . ', ' . auth()->user()->nombre); ?></p>
                              <p class="card-text"><small class="text-muted"></small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                    <a href="<?php echo e(url('/logout')); ?>" class="btn btn-warning btn-flat">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
              <?php
              $permisos = DB::table('Permiso as pm')
                ->join('Perfil as pf', 'pm.Perfil_idPerfil', '=', 'pf.idPerfil')
                ->join('users as usu', 'pf.idPerfil', '=', 'usu.Perfil_idPerfil')
                ->select('pm.idPermiso', 'pm.nombre as nomPer')
                ->where('usu.idUsers', '=', auth()->user()->idUsers)
                ->get();
              
              $listPermisos = array();
              foreach ($permisos as $per) {
                array_push($listPermisos, $per->nomPer);
              }
              //if (in_array("gestionArticuloPersonal", $listPermisos)) {
              //}
              ?>

              <?php if(in_array("lectura", $listPermisos)): ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Ver Articulos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="/blogArticulo/principal"><i class="fa fa-globe"></i>Todos</a></li>
                    <li><a href="/blogArticulo/principal/buscarTipo/1"><i class="fa fa-newspaper-o"></i>Actualidad</a></li>
                    <li><a href="/blogArticulo/principal/buscarTipo/2"><i class="fa fa-film"></i>Espectaculo</a></li>
                    <li><a href="/blogArticulo/principal/buscarTipo/3"><i class="fa fa-users"></i>Sociales</a></li>
                    <li><a href="/blogArticulo/principal/buscarTipo/4"><i class="fa fa-futbol-o"></i>Deportes</a></li>
                  </ul>
                </li>
              <?php endif; ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Gestión</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    
                    <?php if(in_array("gestionArticuloPersonal", $listPermisos)): ?>
                      <li><a href="<?php echo e(url('/blogArticulo/articulo')); ?>"><i class="fa fa-newspaper-o"></i>Mis Articulos</a></li>
                    <?php endif; ?>
                    
                    <?php if(in_array("gestionUsuarioPersonal", $listPermisos)): ?>
                      <li><a href="<?php echo e(url('/blogArticulo/perfil')); ?>"><i class="fa fa-male"></i>Perfil</a></li>
                    <?php endif; ?>
                    
                    <?php if(in_array("gestionUsuarioTodos", $listPermisos)): ?>
                      <li><a href="<?php echo e(url('/blogArticulo/usuario')); ?>"><i class="fa fa-users"></i>Usuarios</a></li>
                    <?php endif; ?>
                  </ul>
                </li>
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Blog de Articulos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
                            <!--Contenido-->
                            <?php echo $__env->yieldContent('contenido'); ?>
                            <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Programacion Web - 2019.
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo e(asset('js/jQuery-2.1.4.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    

    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>

  </body>
</html>
