
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login ArticulosVirtuales.com</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets_login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets_login/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets_login/css/form-elements.css">
        <link rel="stylesheet" href="assets_login/css/style.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets_login/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets_login/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets_login/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets_login/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets_login/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Logueate o Registrate en <strong>ArticulosVirtuales.com</strong></h1>
                            <div class="description">
                            	<p>
	                            	Sistema Web de publicación y lectura de Articulos Virtuales.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Inicia sesión en nuestro sitio</h3>
                            		<p>Ingresa tu NickName y contraseña para iniciar sesión:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                                    <?php echo e(csrf_field()); ?>

			                    	<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
			                    		<label class="sr-only" for="name">NickName</label>
                                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="NickName...">
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
			                        </div>
			                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
			                        	<label class="sr-only" for="password">Contrasena</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña..." >
                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Ingresar!</button>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="form-group">
                                        <a href="<?php echo e(url('/register')); ?>" class="btn btn-success">Registrate ahora!</a>
                                        <a href="<?php echo e(url('blogArticulo/principal')); ?>" class="btn btn-info">Ingresar como invitado!</a>
			                        </div>

			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...o inicia sesión con:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Javascript -->
        <script src="assets_login/js/jquery-1.11.1.min.js"></script>
        <script src="assets_login/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets_login/js/jquery.backstretch.min.js"></script>
        <script src="assets_login/js/scripts.js"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>

</html>
