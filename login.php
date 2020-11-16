<?php



	if(!empty($_POST))
	{
		if(empty($_POST['email']) || empty($_POST['clave']))
		{
			$alert = 'ingrese su email y su clave';
		}else{

			require_once "conexion.php";

			$user = mysqli_real_escape_string($conection,$_POST['email']);
			$pass = mysqli_real_escape_string($conection,$_POST['clave']);

			

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE email= '$user' AND clave ='$pass'");
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['id_usuario'];
				$_SESSION['user']  = $data['email'];
				$_SESSION['rol'] 	= $data['rol'];

				header('location: home.php');
			}else{
				$alert = 'El usuario o la clave son incorrectas';
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head class = "header1">
    <meta charset="UTF-8">
    <?php include "INCLUDES/HEADER.php"; ?>
    <?php include "INCLUDES/SCRIPTS.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>login</title>
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>

<body class= "body1">
	
   <form class = "form1" action="" method="post" ALIGN=center>
   	<br>
    <br>
    <br>
   <h1 class="animate__animated animate__backInLeft">login</h1>

   <p>Email <input type="text" placeholder="ingrese su nombre" name="email" ALIGN=center ></p>
   <p>Clave <input type="password" placeholder="ingrese su clave" name="clave" ALIGN=center></p>
   <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
   <input class= "input1"type="submit" value="Ingresar">
   
   </form> 
</body>
</html>