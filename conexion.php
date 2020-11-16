<?php

	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'peluquerias';

	$conection = @mysqli_connect($host,$user,$password,$db);

	//mysqli_close($conection);

	if(!$conection){
		echo "error de conexion";
	}
?>