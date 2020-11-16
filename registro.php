<?php


	include "conexion.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['email'])  ||  empty($_POST['clave'])   ||  empty($_POST['roles'])  || empty($_POST['rut']) || empty($_POST['telefono']))


		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			
			$email  = $_POST['email'];
			$clave  = $_POST['clave'];
			$nombre = $_POST['nombre'];
			$roles    = $_POST['roles'];
			$rut  = $_POST['rut'];
			$telefono  = $_POST['telefono'];
			
			

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE  email ='$email' ");
			$result = mysqli_fetch_array($query);

			if($result >0){
				$alert='<p class="msg_error">el email o el usario ya existen.</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO usuario(nombre,email,clave,rol,rut,telefono)
												VALUES('$nombre','$email','$clave','$roles','$rut','$telefono')");
				if($query_insert){
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}else{
					$alert='<p class="masg_error">error al crear el usuario.</p>';
				}
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	
	<section id="container">

		<div class="form_register"> 
			<h1>registro usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
		<table>
			<form action="" method="post">

														<script>
										  function soloLetras(e) {
										      key = e.keyCode || e.which;
										      tecla = String.fromCharCode(key).toLowerCase();
										      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
										      especiales = [8, 37, 39, 46];
										  
										      tecla_especial = false
										      for(var i in especiales) {
										          if(key == especiales[i]) {
										              tecla_especial = true;
										              break;
										          }
										      }
										  
										      if(letras.indexOf(tecla) == -1 && !tecla_especial)
										          return false;
										  }
										  
										  function limpia() {
										      var val = document.getElementById("miInput").value;
										      var tam = val.length;
										      for(i = 0; i < tam; i++) {
										          if(!isNaN(val[i]))
										              document.getElementById("miInput").value = '';
										      }
										  }
										  </script>
										  
										  






				<label for="nombre">Nombre</label>
				<input type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput"  name="nombre"  id="nombre" placeholder="Nombre completo">
				<label for="email">Correo electronico</label>
				<input type="email" name="email" id="email" placeholder="Correo electronico">
				<label for="clave">clave</label>
				<input type="password" name="clave" id="clave" placeholder="clave de acceso">

				<label for="rut">rut</label>
				<input type="text" name="rut" id="rut" placeholder="111 111 111-1">
				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" placeholder="telefono" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>

				<label for="roles">tipo de usuario</label>


				<?php

					$query_rol = mysqli_query($conection,"SELECT * FROM roles");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				?>

				<select name="roles" id="roles">
					<?php
						if($result_rol > 0)
						{
							while ($roles = mysqli_fetch_array($query_rol)){
					?>
							<option value="<?php echo $roles["id_rol"]; ?>"><?php echo $roles["roles"] ?></option>
					<?php
								}
						}
					?>
				</select>
				<input type="submit" value="crear usuario" class="btn_save">

			</form>
		</div>
	</section>
	<table>
</body>
</html>