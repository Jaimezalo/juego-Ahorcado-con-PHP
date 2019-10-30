<?php 
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Juego del ahorcado</title>
	<style type="text/css">
		body{
			background-color:black;
			color:yellow;
		}
		
		#cabecera{
		display: block;
			width:12%;
			margin:0 auto;
		}
		h3{
			font-size:3em;
			color:yellow;
			text-align:center;
			
		}
		a{
			margin-top:30%;
			
			font-size:3em;
			border:5px solid white;
			
		}
	</style>
	</head>
	<body>
		
		<h3>GAME OVER</h3>
		<h3>La palabra era <?php
		  echo $_SESSION['palabrasecreta'];
		  session_destroy();
		?></h3>
		<div id="cabecera">
		<a href="ahorcado.php">JUGAR</a>
		</div>
	</body>
</html>