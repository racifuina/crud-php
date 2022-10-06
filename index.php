<?php
// incluir el archivo de configuración de la bdd
include_once("config.php");

//obtener los datos ordenados por id de manera descendente
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); 
?>

<html>
<head>	
	<title>Inicio</title>
</head>

<body>
<a href="add.html">Agregar nuevos datos</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nombre</td>
		<td>Edad</td>
		<td>Correo Electronico</td>
		<td>Actualizar</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Esta seguro que lo quiere eliminar?')\">Eliminar</a></td>";		
	}
	?>
	</table>
</body>
</html>
