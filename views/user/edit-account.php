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
<?php $user = $this->data['user']; ?>
<body class="boxed-style" data-session="<?php echo $user->getType(); ?>" >
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
								<?php
									if($user->getType() == 'REGISTRADO'){
								?>
									<li>
										<a href="<?php echo constant('URL');?>user">Perfil</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>news">News</a>
									</li>
								<?php
									}else if($user->getType() == 'REPORTERO'){
								?>
									<li>
										<a href="<?php echo constant('URL');?>user">Perfil</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>news">News</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>post">New Article</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>pending-news">Pending news</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>my-news">My news</a>
									</li>
								<?php
									}else if($user->getType() == 'EDITOR'){
								?>
									<li>
										<a href="<?php echo constant('URL');?>user">Perfil</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>news">News</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>pending-news">Pending news</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>my-news">My news</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>user/users">Users</a>
									</li>
									<li>
										<a href="<?php echo constant('URL');?>articles">Articles</a>
									</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="header-banner-place">
				<div class="container">
					<a class="navbar-brand" href="index.html">
						<img src="<?php echo constant('URL') ?>public/assets/images/logo.png" alt="">
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
								<h1><span>Editar Cuenta</span></h1>
							</div>
							<form enctype="multipart/form-data" method="POST" id="register-form" action="<?php echo constant('URL'); ?>user/editAccount">
								<div class="row">
									<div class="user-thumbnail">
									<input type="file" id="user-thumb" name="user-thumb" id="user-thumb"/>
									<span>Fotografía</span>
									<div class="thumb-holder">
									<?php echo '<img class="img-fluid" src="data:image/png;base64,'.base64_encode($user->getAvatar()).'"/>'; ?>
									</div>
								</div>

								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="first-name">Nombre</label>
										<input required id="first-name" name="first-name" type="text" value="<?php echo $user->getName(); ?>">
									</div>
									<div class="col-md-6">
										<label for="last-name">Apellido</label>
										<input required id="last-name" name="last-name" type="text" value="<?php echo $user->getLastname(); ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<label for="email">E-mail</label>
										<input required id="email" name="email" type="text" readonly value="<?php echo $user->getEmail(); ?>" >
									</div>
									<div class="col-md-4">
										<label for="username">Nombre de Usuario</label>
										<input required id="nickname" name="nickname" type="text" value="<?php echo $user->getNickname(); ?>">
									</div>
									<div class="col-md-4">
										<label for="phone">Telefono</label>
										<input required id="phone" name="phone" type="text" value="<?php echo $user->getPhone(); ?>">
									</div>
								</div>
								<label for="pwd">Contraseña</label>
								<input id="pwd" name="pwd" type="password">
								<button type="submit" id="save">
									<i class="fa fa-paper-plane"></i> Guardar
								</button>
									<!-- <button type="submit" id="delete-account">
									<i></i> Eliminar Cuenta
								</button> -->
							</form>
						</div>
						<!-- registro de usuario -->

					</div>
					<?php 
						if($user->getType() != 'EDITOR' ){
					?>
						<div class="row">
							<div class="col-3">
								<a class="btn btn-danger text-light" id="delete" data-toggle="modal" data-target="#deleteModal">

								</i> Elminar cuenta
								</a>
							</div>
						</div>
					<?php
						}
					?>
				</div>
				
			</div>
		</section>

		<!-- footer 
			================================================== -->
		<footer>
			<div class="container">

				<div class="up-footer">

					<div class="footer-widget text-widget">
						<h1><a href="index.html"><img src="<?php echo constant('URL'); ?>/public/assets/images/logo-black.png" alt=""></a></h1>
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
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <div class="title-section">
	        	<h1>Estas Seguro?</h1>
	        </div>
			<form id="login-form" method="post" action="<?php echo constant('URL') ?>user/delete">
				<div class="row">
					<div class="col">
						<button class="btn btn-primary btn-block text-light" id="d-yes">Si</button>
					</div>
				</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- fin login -->

	<script src="<?php echo constant('URL'); ?>public/assets/js/modernmag-plugins.min.js"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/popper.js"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/gmap3.min.js"></script>
	<!-- <script src="<?php echo constant('URL'); ?>public/assets/js/modules/tabline.js"></script> -->
	<script src="<?php echo constant('URL'); ?>public/assets/js/script.js"></script>

	<script>

		/* const dyes = document.querySelector('#d-yes');
		dyes.addEventListener('click', function(){
			$.ajax({
				type: 'POST',
				url: 'http://localhost/livetalkapp/user/delete',
				data: {user: email},

			})
			.done((response) => {
				
			})
		}) */


		/* const saveBtn = document.querySelector('#save');
		
		saveBtn.addEventListener('click', (e) => {
			e.preventDefault();
			
			const form = document.getElementById('register-form');

			const formData = new FormData(form);

			$.ajax({
				type: "POST",
				url: "http://localhost/livetalkapp/user/editAccount",
				dataType: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done((res)=>{
				const user = JSON.parse(res);
				console.log(user);
				formData.set('pwd', 5);
			})

		}) */
		



		/* const formData = new FormData();
		formData.append('img-thumb', form['user-thumb'].file)

		const getFormValues = ()=>{
			const form = document.getElementById('register-form');
			return {
				firstname : form['first-name'].value,
				lastname : form['last-name'].value,
				//email : form['email'].value,
				username : form['username'].value
				//pwd : form['password'].value
			}
		}

		const save = () =>{
			$.ajax({
				type: "POST",
				url: "http://localhost/livetalkapp/user/editAccount",
				data: getFormValues(),
				success: function(res){
					alert(res);
				},
				error: function(res){
					console.log(res);
				}
			})
		}

		const saveBtn = document.querySelector('#save');

		saveBtn.addEventListener('click', (e)=>{
			e.preventDefault();
			save();

		}) */

	</script>
	
</body>
</html>