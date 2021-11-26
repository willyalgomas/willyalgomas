<?php
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$mensaje = $_POST['mensaje'];
	$para = 'jorgehernandez.iesalquerias@gmail.com';
	$titulo = 'Mensaje recibido de usuario solicitando soporte técnico';
	$header = 'From: ' . $email;
	$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";


	#Configuración del acceso ala Base de Datos
	#Se efectúa la conexión usando 4 parámetros (servidor, usuario, contraseña y base de datos)
	$db = new mysqli("localhost", "root", "","soporte1");

	#Se ejecuta una consulta SQL    
	$sql="INSERT INTO consultas(Nombre, email, mensaje) VALUES ('$nombre','$email','$mensaje')";
	$datosdb=$db->query($sql);
	
	echo "<HTML>\n";
	echo "<BODY>\n";
	echo "<HEAD>\n";
	echo "<TITLE>Consulta realizada</TITLE>\n";
	echo "</HEAD>\n";
	echo "<H1>Consulta realizada</H1>\n";
	echo "Lista de consultas:\n";

	$sql="SELECT Nombre, email, mensaje FROM consultas";
	$datosdb=$db->query($sql);	
	if(($datosdb->num_rows)>0){
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>Nombre</th>
            <th>eMail</th>
            <th>Mensaje</th>
        </tr>";
		while ($var_fila=$datosdb->fetch_array())
		{
			echo "<tr>
			<td>".$var_fila["Nombre"]."</td>";
			echo "<td>".$var_fila["email"]."</td>";
			echo "<td>".$var_fila["mensaje"]."</td></tr>";
		}
    }
    else {
        echo "No hay Registros";
    }
	if ($_POST['submit']) {
		if (mail($para, $titulo, $msjCorreo, $header)) {
			echo "<script language='javascript'>
			alert('Mensaje enviado. En breve nos pondremos en contacto con usted. Muchas gracias.');
			</script>";
		} else {
			echo 'Falló el envio';
		}
	}
	echo "</BODY>\n";
	echo "</HTML>\n";	
?>