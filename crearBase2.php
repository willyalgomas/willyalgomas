<?php
$servername = "localhost";
$username = "root";
$password = "";
//Crear Conexion con MYSQL
$conn = new mysqli($servername, $username, $password);
//Comprobar la Conexi�n
if ($conn->connect_error) {
    die("Fallo de Conexi�n: " . $conn->connect_error);
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
	  echo ("Ha surgido alg�n problema durante la creaci�n de la BBDD y/o la tabla.<br>".$conn->error);
else
	  echo ("Base de datos y tabla creadas");
  
//Cerrar Conexi�n
$conn->close();

?>
