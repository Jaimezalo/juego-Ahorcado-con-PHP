<?php
    session_start();
    
    include_once 'funcionesAhorcado.php';
    
    if(!isset($_SESSION['palabrasecreta'])){
        
        $_SESSION['palabrasecreta'] = elegirPalabra();
        $_SESSION['fallos'] = 10;
        

    }
    
    
    if(isset($_POST['letra'])){
        
        $_SESSION['letrausuario'] .= $_POST['letra'];
        $letras = $_SESSION['letrausuario'];
        $cadena = $_SESSION['palabrasecreta'];
        $_SESSION['palabrausuario'] = generaPalabraconHuecos($letras, $_SESSION['palabrasecreta']);
        
    }
    
    if(comprobarLetra($letras, $cadena)=== FALSE){
        $_SESSION['fallos']--;
    }
    
    
    if($_SESSION['fallos'] === 0){
        
        header("Location:gameOver.php");
        
    }
   
    //La sesión se elimina tras 600 segundos de inactividad
    $inactividad = 20;
    if(isset($_SESSION["timeout"])){
        
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: adivina.php");
        }
    }
    $_SESSION["timeout"] = time();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Juego del ahorcado</title>
	<style type="text/css">
        *{
            margin:0;
            padding:0;
        }
		
        #cabecera{
            position:fixed;
            width:100%;
            margin:0;
            height:30%;
            background-color:red;
            text-align:center;
            line-height : 40px;
        }
		form{
		    position:fixed;
		    width:30%;
   			background-color:#E6E6E6;
   			border-style: outset;
   			padding: 2%;
   			margin:20% auto 0 30%;
		}
		
	 
	 	p{
	 		text-align:center;
	 		font-size:2em;
	 	}
	</style>
	</head>
	<body>
		<div id="cabecera">
			<h1>Juego del Ahorcado</h1>
			<?php  
			     echo "<h3>".$_SESSION['palabrausuario']."</h3>
                       <h3>".$_SESSION['fallos']." oportunidades.</h3>";
			?>
         </div>
		<div class="formulario">
		
		<form action="ahorcado.php" method="post">
			<p>LETRA</p><input type="text" max="1" min="1" maxlength="1" name="letra">
			<input type="submit" name="enviar" value="JUGAR">
		</form>
		</div>
	</body>
</html>