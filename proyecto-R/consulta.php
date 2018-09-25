<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$break="<br>";

	$usuario=$_POST['_user'];
	$clave=$_POST['_pass'];

	$enlace = mysqli_connect("127.0.0.1", "carlitos", "qwerty", "proyector");

	$query = "SELECT `_indice` FROM `pcusers` WHERE `user` = '".$usuario."' AND `pass` = password('".$clave."');";

	$resultado = mysqli_query($enlace, $query);

	$fila = mysqli_fetch_row($resultado);

	if ($fila) {
		header("refresh: 0; url=menu.php");
	} else { 
		header("refresh: 0; url=indice.php");
	}

	mysqli_close($enlace);
?>
