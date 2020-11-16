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

			

			$query = mysqli_query($conection,"SELECT * FROM clientes WHERE email= '$user' AND clave ='$pass'");
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['id_cliente'];
				$_SESSION['rut'] = $data['rut'];
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['user']  = $data['email'];

				header('location: home.php');
			}else{
				$alert = 'El usuario o la clave son incorrectas';
				session_destroy();
			}
		}
	}

?>