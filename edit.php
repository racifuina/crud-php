<?php
// incluir el archivo de configuración de la bdd
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
			echo "<font color='red'>El correo electronico es obligatorio.</font><br/>";
		}		
	} else {	
		//actualizar el registro en la tabla
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirigir al index php
		header("Location: index.php");
	}
}
?>
<?php
//obtener el id desde la url
$id = $_GET['id'];

//selecciónar elregistro de la tabla
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edición de datos</title>
</head>

<body>
	<a href="index.php">Inicio</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Edad</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Correo Electronico</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Guardar Cambios"></td>
			</tr>
		</table>
	</form>
</body>
</html>
