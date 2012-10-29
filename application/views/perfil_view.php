<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Bourni</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/ui-lightness/jquery-ui.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$("#btoUserData").toggle(function(){
				$("#userdata").animate({
				    opacity: 1,
    				top: '+=75'
				},900)}, function(){
					$("#userdata").animate({
					    opacity: 0.5,
    					top: '-=75'
					},900);
				});
		});
	</script>
</head>
<body>
	<div id="container">
		<div id="header">
			<header>
				<div id="userdata">
					<ul>
						<li>
							< a href=<a href="<?php echo base_url(); ?>panel/inicio">Inicio</a> >
						</li>
						<li>< a href=<a href="<?php echo base_url(); ?>panel/perfil">Perfil</a> ></li>
						<li>< a href=<a href="<?php echo base_url(); ?>panel/salir">Salir</a> ></li>
						<li>------------------</li>
						<li>
							<a id="btoUserData"href="javascript:void(0);">
								<img src="<?php echo base_url(); ?>assets/img/perfil.png" width="30" alt="">
								<?php echo $this->session->userdata("user"); ?>
							</a>
						</li>
					</ul>
				</div>
			</header>	
		</div>

		<div id="wrapper">
			<div id="menuDiv">
				<ul>
					<li><a href="<?php echo base_url(); ?>panel/inicio">Inicio</a></li>
					<li><a href="<?php echo base_url(); ?>panel">Muro</a></li>
					<li><a href="#s3">Compartir</a></li>
					<li></li>
					<li><input type="search" name="qUser" id="qUser" placeholder="Quiero seguir a...?"></li>
				</ul>
			</div>
			<div id="inicio">
				<section id="opciones">
					<header>< sidebar ></header>
					<ul>
						<li>
							<img src="<?php echo base_url(); ?>assets/img/pastebin.png" alt="compartir">
							<a href="javascript:void(0);" id="pasteBinCode">Compartir Code</a>
						</li>
						<li>
							<img src="<?php echo base_url(); ?>assets/img/bug.png" alt="Avisar">
							<a href="">Bugs</a>
						</li>
					</ul>
					<header>< / sidebar ></header>
				</section>
				<section id="muro">
					<header> Mi Perfil </header>
						< form method = 'post' action = 'actualizarPersona' >
						<div id="perfilData">
							<br>
							<?php echo form_open("panel/updatePersona"); ?>
							<?php foreach($persona as $row): ?>
								Nombre y Apellido: <input type="text" name="n_p" value="<?php echo $row->n_p; ?>">
								<br>
								Estudio: <input type="text" name="estudios" value="<?php echo $row->estudios; ?>">
								<br>
								Profesión: <input type="text" name="profesion" value="<?php echo $row->profesion ?>">
								<br>
								Lenguajes programación: <input type="text" name="lenguajes" value="<?php echo $row->lenguajes ?>">
								<br>
								Descripción: <input type="text" name="descripcion" value="<?php echo $row->descripcion ?>">
								<br>
								Imagen: <input type="text" name="imagen" value="<?php echo $row->imagen ?>">
								<br>
								<input type="hidden" name="id_persona" value="<?php echo $row->id_persona; ?>">
								< input type='buttom' value="<input type="submit" value="Actualizar">">
							<?php endforeach; ?>
							<?php echo form_close(); ?>
						</div>
						<br>
						< / form >
						<hr>
						<br>
						Si quiere cambiar la contraseña haga <a href="#">click aquí</a>
				</section>
			</div>
		</div>
	</div>
</body>
</html>