<?php
	session_start();
	//comprobacion de que la variable sesion contiene el subindice usuario
	if(isset($_SESSION['usuario'])){
	//en ese caso iniciar sesion 
	echo '<script> window.location="index.php"; </script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modulo Admin</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--para visualizacion en dispositivos moviles -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos-formulario.css">
	<link href="assets/css/font-awesome.css" rel="stylesheet">
</head>
<body>
	<div class="container"> 
	  <div class="row" id="pwd-container">
	    <div class="col-md-4">
	    </div>
	    <!--Formulario para logueo de usuarios registrados -->
	    <div class="col-md-4">
	      <section class="login-form">
		        <form method="post" action="validar.php" role="login">    
		          <input type="text" name="usuario" placeholder="Usuario" required class="form-control input-lg" value="" />
		          <input type="password" class="form-control input-lg"  name="clave" id="clave" placeholder="Password" required="" />
		          <div class="pwstrength_viewport_progress"></div>
		          <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Iniciar Sesion</button> 
		        </form>
	      </section>  
	    </div>
	</div>
  
<script src="js/jquery.js"></script>
<script src="js/jquery-latest.js"></script>
<script src="js/modelo-formulario.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
