<?php  
include "./conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "INCLUDES/SCRIPTS.php"; ?>
	<title>Sisteme Ventas</title>
</head>
<body>
	<?php include "INCLUDES/HEADER.php"; ?>
	<section id="container">
	<table class = "tbl_locacion" border="1">
		<tr>
		 <th>tipos de servicios </th>
		 <th>servicios</th>
		</tr>
		<td>servicio</td>
		<td>
			<form>

    <script type="text/javascript">

        // funcion que se ejecuta cada vez que se selecciona una opción

        function cambioOpciones()

        {

            document.getElementById('showId').value=document.getElementById('opciones').value;

        }

    </script>

 

    <select id='opciones' onchange='cambioOpciones();'>

        <option value=''>Selecciona un servicio</option>

        <option value='14990'>Perfilado de Barba</option>

        <option value='14990'>Corte de cabello</option>

        <option value='14990'>Rasurado de Cabeza</option>

    </select>

 

    <!-- input donde se mostrara el id de la opción -->

    <input type='text' id='showId' />

</form>
			
				<br>
				<br>
				<br>
				<br>
    <button>Reservar hora</button>
  	</div>
	</div>

</section>
</body>
</html>