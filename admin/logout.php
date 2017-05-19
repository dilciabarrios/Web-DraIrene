<?php
session_start();
// cerramos sesion 
session_destroy();
echo 'Cerraste sesión';
// una vez cerrada sesion recargar a login.php
echo '<script> window.location="login.php"; </script>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Saliendo...</title>
	<meta charset="utf-8">
</head>
<body>
<script language="javascript">location.href = "login.php";</script>
</body>
</html>