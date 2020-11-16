<?php

	if(empty($_SESSION['active']))
	{
		header('home.php');
	}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
<h1>BIENVENIDOS</h1>
    <div class="header">
			<h1>peluqueria</h1>
			<div class="optionsBar">
				<span>|</span>
				<img class="photouser" src="img/user.jpg" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
</body>
</html>