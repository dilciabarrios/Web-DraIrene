<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?php

$sql = "Delete FROM usuarios WHERE id_usuario='".$_GET['id_usuario']."'";
//echo "</br>".$sql."</br>";
$result = query($sql);
if (! $result){die ("ERROR AL ELIMINAR:". mysql_error());}

?>
<script type="text/javascript">
window.location="http:index.php?menu=usuarios";
</script>
<body>
</body>
</html>
