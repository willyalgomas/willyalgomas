<?php
$servername = "localhost";
$username = "root";
$password = "";
//Crear Conexion con MYSQL
$conn = new mysqli($servername, $username, $password);
//Comprobar la Conexión
if ($conn->connect_error) {
    die("Fallo de Conexión: " . $conn->connect_error);
} 
//Crear base de datos
$sql = "CREATE DATABASE soporte1";
if ($conn->query($sql) === FALSE) {
    echo "Error al Crear la Base de Datos:". $conn->error;
}
//Crear la tabla
$conn->select_db("soporte1");
$consulta="CREATE TABLE consultas (Nombre VARCHAR(255), email VARCHAR(255), mensaje VARCHAR(255));";
if ($estado=$conn->query($consulta)===FALSE)
	  echo ("Ha surgido algún problema durante la creación de la BBDD y/o la tabla.<br>".$conn->error);
else
	  echo ("Base de datos y tabla creadas");
  
//Cerrar Conexión
$conn->close();

?>
