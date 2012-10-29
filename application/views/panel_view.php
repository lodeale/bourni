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

			$("#pasteBinCode").toggle(function(){
				$("#msgMuro").attr("placeholder","titulo");
				$("#insertMuro form").append("<textarea cols='70' rows='50' name='code'> ..::code::.. </textarea>")
				$("#insertMuro form").append("<input type='submit' value='Enviar' name='btoCodePasteBin'>");
			},function(){
				$("#insertMuro form").empty();
				$("#insertMuro form").append("<input type='text' name='msgMuro' id='msgMuro' placeholder='que lo que?'>"); 
			});

			/*
			* Si dan click en seguir que vaya al perfil
			* del usuario seleccionado
			*/
			$("#searchFriends").click(function(){
				var user = $("#qUser").val();
				location.href="<?php echo base_url(); ?>panel/perfilFriends/"+user
			});

		});

		function OnSearch(input){
			$.ajax({
				data: {
					qUser : $("#qUser").val()
				},
				type: "POST",
				url: "<?php echo base_url(); ?>panel/searchUser",
				success : function(data){
					$("#menuDiv").append(data)
				}
			});
		}
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
					<li>
						<input onsearch="OnSearch(this);" type="search" name="qUser" id="qUser" placeholder="Quiero seguir a...?">
						<a href="javascript:void(0);" id="searchFriends"><img src="<?php echo base_url(); ?>assets/img/buscar.png" width="30" alt="Buscar"></a>
					</li>
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
							<a href="#">Bugs</a>
						</li>
					</ul>
					<header>< / sidebar ></header>
				</section>
				<section id="muro">
					<header> Mi Muro </header>
						<div id="insertMuro">
							<?php echo form_open("panel/insertMuro"); ?>
								<input type="text" name="msgMuro" id="msgMuro" placeholder="que lo que?">
							<?php echo form_close(); ?>
						
						</div>
						<br>
						< div id = post >
						<div id="post">
							<ul id="postU">
							<?php foreach($post as $friends): ?>
								<?php foreach($friends as $row): ?>
								<li>
									<div id="user">
										<?php echo $row->usuario; ?> 
									</div>
									
									<div id="subPost">
										<?php echo $row->post;?>
									</div>
									<div id="categoria">
										Tags:
										<?php echo $row->categoria;?>
										<span id="data">
											<?php echo $row->fecha;?>
											<?php echo $row->hora;?>
										</span>
									</div>
									<hr>
								</li>
								<?php endforeach; ?>
							<?php endforeach; ?>
							</ul>
						</div>
						< / div >
				</section>
			</div>
		</div>
	</div>
</body>
</html>