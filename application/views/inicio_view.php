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
			$("#wrapper").tabs();
		});
	</script>
</head>
<body>
	<div id="container">
		<div id="header">
			<header>
				
			</header>	
		</div>

		<div id="wrapper">
			
			<ul id="menu">
				<li><a href="#s1">Inicio</a></li>
				<li><a href="#s2">Registrar</a></li>
				<li><a href="#s3">Login</a></li>
			</ul>

			<section id="s1">
				<div class="error">
				<?php echo validation_errors(); ?>
				</div>
				<header>< article id= Introducción ></header>
				<article>
					<h2> < h2 >¿Para quien es esta red Social? < / h2 ></h2>
					<p>
						<img src="<?php base_url(); ?>assets/img/redsocial.jpg" alt="redsocial">
						< p > <br>
						La idea es que programadores puedan difrutar esta red <br>
						y en lo posible puedan ayudar a su contrucción. Pero esta <br>
						dirijido a todos los programadores del ambito web. <br>
						< / p >
					</p>
					<h2> < h2 > ¿Cual es la diferencia con otras? < / h2 ></h2>
					<p>
						< p > <br>
						La idea para diferenciar de otras es la confianza. No queremos <br>
						estar haciendo todo privado, mas que nada que la mayoría de las <br>
						cosas sean públicas y que también cualquier usuario pueda prorgamar <br>
						una parte del sitio desde su perfil cuando el sistema le suguiera.
						<br>
						<br>
						Queremos que los usuarios puedan subir código para vender, regalar, etc <br>
						y para que este lejos de los que es un foro trataremos de crear relaciones <br>
						entre usuario no por amigo, sino como seguidores, seguidos, etc como twitter. <br>
						< / p >
					</p>
				</article>
				<header>< / article ></header>
			</section>
			<section id="s2">
				<header> Registrar</header>
				<article id="formulario">
					<?php echo form_open("inicio/registrar") ?>
					< form ><br>
						<label for="user">< input name=n_p value= </label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="n_p" id="n_p" placeholder="nombre y apellido" required>
						/>
						<br>
						<label for="user">< input name=usuario value= </label>
						<input type="text" name="user" id="user" placeholder="usuario" required>
						/>
						<br>
						<label for="clave">< input name=clave value= </label>&nbsp;&nbsp;
						<input type="password" name="clave" id="clave" placeholder="Usar 6 digitos minimo" required>
						/>
						<br>
						<label for="clave">< input name=reclave value= </label>
						<input type="password" name="reclave" id="reclave" placeholder="Confirmar Clave" required>
						/>
						<br>
						<label for="email">< input name=email value= </label>&nbsp;&nbsp;
						<input type="email" name="email" id="email" placeholder="ejemplo@domin.com" required>
						/>
						<br>
						< input type=submit value=&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Enviar"> />
						<br>
					< / form >
					<?php echo form_close(); ?>
				</article>
			</section>
			<section id="s3">
				<header>Login</header>
				<article id="login">
					<?php echo form_open("inicio/acceder") ?>
					< form ><br>
						<label for="usuario">< input name=usuario value= </label>
						<input type="text" name="usuario" id="usuario" required>
						/>
						<br>
						<label for="clave">< input name=clave value= </label>&nbsp;&nbsp;
						<input type="password" name="clave" id="clave" required>
						/>
						<br>
						< input type=submit value=&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Enviar"> />
						<br>
					< / form >
					<?php echo form_close(); ?>
				</article>
			</section>
		</div>
		<div id="footer">
			<footer>
				<a href="javascript:void(0);">webaMIGA1</a>
				<a href="javascript:void(0);">webaMIGA1</a>
				<a href="javascript:void(0);">webaMIGA1</a>
				<a href="javascript:void(0);">webaMIGA1</a>
			</footer>
		</div>
	</div>
</body>
</html>