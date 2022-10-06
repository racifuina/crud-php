<?php
//incluir el archivo de configuración de la conexión
include("config.php");

//obtener el id desde la data de la url
$id = $_GET['id'];

//eliminar el registro en la tabla
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

//redirigir al index.php
header("Location:index.php");
?>

