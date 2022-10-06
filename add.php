<html>
<head>
	<title>Agregar Datos</title>
</head>

<body>
<?php
// incluir el archivo de configuración de la bdd
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// revisión de campos vacios
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>El nombre es obligatorio.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>La edad es obligatoria.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>El Correo electronico es obligatorio.</font><br/>";
		}
		
		//link a la pagina anterior
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		// todos los campos tienen datos
			
		//insertar datos a la bdd	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		//mostrar mensaje de exito
		echo "<font color='green'>Los datos fueron agregados exitosamente.";
		echo "<br/><a href='index.php'>Ver Resultados</a>";
	}
}
?>
</body>
</html>
