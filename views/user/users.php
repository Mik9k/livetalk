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
<body class="boxed-style" >
	<!-- Container -->
	<div id="container">
        <?php $users = $this->data['users']; ?>
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="top-line">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<ul class="info-list">
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
							</ul>
						</div>	
						<div class="col-sm-6">
							<ul id="user-tabs"  class="info-list right-align">
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
                    <div class="col">
                        <table class="table">
                            <head>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Delete User</th>
                                    <th scope="col">Sign as Reporter</th>
                                </tr>
                            </head>
                            <tbody>
                                <?php
                                    foreach ($users as $u) {
                                        echo '<tr>';
                                        echo '<td>'.$u->getName().'</td>';
                                        echo '<td>'.$u->getNickname().'</td>';
                                        echo '<td>'.$u->getEmail().'</td>';
                                        echo '<td>'.$u->getEmail().'</td>';
                                        echo '<td>'.$u->getType().'</td>';
                                        echo '<td><a class="btn btn-danger text-light" href="'.constant('URL').'user/remove/'.$u->getEmail().'">Delete</a></td>';
                                        if($u->getType() == 'USER' || $u->getType() == 'REGISTRADO'){
                                            echo '<td><a class="btn btn-primary text-light" href="'.constant('URL').'user/signeditor/'.$u->getEmail().'">Sign as Reporter</a></td>';
                                        }else {
                                            echo '<td><p class="text warning"> FIRMADO </p></td>';
                                        }
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
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


	<script src="<?php echo constant('URL'); ?>public/assets/js/modernmag-plugins.min.js"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/popper.js"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="<?php echo constant('URL'); ?>public/assets/js/gmap3.min.js"></script>
	<!-- <script src="<?php echo constant('URL'); ?>public/assets/js/modules/tabline.js"></script> -->
	<script src="<?php echo constant('URL'); ?>public/assets/js/script.js"></script>
	
</body>
</html>