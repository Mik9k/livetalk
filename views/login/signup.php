<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>Live Talk</title>

    <meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/css/modernmag-assets.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/assets/css/style.css">

</head>
<body class="boxed-style">

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="top-line">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<ul class="info-list">
							</ul>
						</div>	
						<div class="col-sm-6">
							<ul class="info-list right-align">
								<li>
									<a href="#" data-toggle="modal" data-target="#loginModal">Iniciar Sesión</a>
								</li>
								<li>
									<a href="register.html">Regístrate</a>
								</li>
							</ul>
						</div>	
					</div>
				</div>
			</div>

			<div class="header-banner-place">
				<div class="container">
					<a class="navbar-brand" href="index.html">
						<img src="<?php constant('URL'); ?>public/assets/images/logo.png" alt="">
					</a>
				</div>
			</div>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav m-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.html">Nacional</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="section.html">Internacional</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="section.html">Deportes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="section.html">Sociales</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="section.html">Opinion</a>
							</li>
							<li class="nav-item drop-link">
								<a class="nav-link food" href="#">Otros</a>
								<ul class="dropdown">
									<li><a href=" ">Política</a></li>
									<li><a href=" ">Cultura</a></li>
									<li><a href=" ">Virales</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- termina Header -->

		<section id="content-section">
			<div class="container">

				<div class="row">
					<div class="col-lg-8">

						<!-- register box -->
						<div class="register-box">
							<div class="title-section">
								<h1><span>Regístrate</span></h1>
							</div>
							<form  action="<?php constant('URL');?>login/signup" method="post" enctype="multipart/form-data" id="register-form">
								<div class="row">
									<div class="col-md-6">
										<label for="first-name">Nombre</label>
										<input id="first-name" name="first-name" type="text">
									</div>
									<div class="col-md-6">
										<label for="last-name">Apellido</label>
										<input id="last-name" name="last-name" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<label for="email">E-mail</label>
										<input id="email" name="email" type="text">
									</div>
									<div class="col-md-4">
										<label for="username">Nombre de Usuario</label>
										<input id="username" name="username" type="text">
									</div>
									<div class="col-md-4">
										<label for="phone">Numero de telefono</label>
										<input id="phone" name="phone" type="text">
									</div>
								</div>
								<label for="password">Contraseña</label>
								<input id="password" name="password" type="password">
								<div class="user-thumbnail">
									<input type="file" name="user-thumb" id="user-thumb"/>
									<span>Fotografía</span>
									<div class="thumb-holder">
									</div>
								</div>
								<button type="submit" id="submit-register2">
									<i class="fa fa-paper-plane"></i> Regístrate
								</button>
							</form>
						</div>
						<!-- registro de usuario -->

					</div>
						
				</div>
				
			</div>
		</section>

		<!-- footer 
			================================================== -->
		<footer>
			<div class="container">

				<div class="up-footer">

					<div class="footer-widget text-widget">
						<h1><a href="index.html"><img src="<?php constant('URL');?>public/assets/images/logo-black.png" alt=""></a></h1>
					</div>

				</div>

			</div>
			<div class="down-footer">
				<div class="container">
					<p>&copy; Copyright LIVE TALK</p>
				</div>
			</div>
		</footer>
		<!-- fin footer -->

	</div>
	<!-- fin container -->



	<!-- Login  -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <div class="title-section">
	        	<h1>Iniciar Sesión</h1>
	        </div>
			<form action="<?php constant('URL');?>login/login" method="post" id="login-form">
				<p>Inicia sesión en tu cuenta</p>
				<label for="email">Usuario</label>
				<input id="email" name="email" type="text">
				<label for="pwd">Contraseña</label>
				<input id="pwd" name="pwd" type="password">
				<button type="submit" id="submit-register">
					<i class="fa fa-paper-plane"></i> Iniciar
				</button>
			</form>
	      	<p>¿No tienes cuenta? <a href="register.html">Regístrate aquí!</a></p>

	      </div>
	    </div>
	  </div>
	</div>
	<!-- fin login -->

	<script src="<?php echo constant('URL'); ?>public/assets/js/modernmag-plugins.min.js"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/popper.js"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/assets/http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/gmap3.min.js"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/script.js"></script>
	
</body>
</html>