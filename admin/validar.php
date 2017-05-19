<?php
	session_start(); 
	include("resources/includes/database.php");
	conexion ();
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
     <!--Comprueba inicio del sesion del usuario  -->
		<?php
			if(isset($_POST['login'])){
				$usuario = $_POST['usuario'];
				$clave = $_POST['clave'];
				$nombres = $_POST['nombres'];
				$id_perfil = $_POST['id_perfil'];
				// comprobacion de que el usuario que inicio sesion se encuentre registrado
				$log = query("SELECT * FROM usuarios WHERE usuario='$usuario' AND  clave='$clave'");
					if (num_rows($log)>0) {
						$row = fetch_array($log);
						//guardo variables para mi inicio de sesion y respectivas validaciones en el sistema
						$_SESSION['usuario'] = $row['usuario']; 
						$_SESSION['nombres'] = $row['nombres']; 
						$_SESSION['id_perfil'] = $row['id_perfil']; 
					  echo 'Iniciando sesión para usuario '.$_SESSION['usuario'].' <p>';
						echo '<script> window.location="index.php"; </script>';
					}
					else{
					// en caso de que no correspondan recargar nuevamente login.php
						echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
						echo '<script> window.location="login.php"; </script>';
				}
			}
		?>	
</body>
</html>