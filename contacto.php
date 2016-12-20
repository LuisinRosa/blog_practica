<?php 
	require 'admin/config.php';
	require 'functions.php';

	$conexion=conexion($db_config);
	if (!$conexion) {
		header('Location:'.RUTA.'/error.php');	
	}

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$nombre=limpiarDatos($_POST['nombre']);
		$correo=limpiarDatos($_POST['email']);
		$msj=limpiarDatos($_POST['mensaje']);

			$enviar_a='j.luis7878@hotamil.com';
			$asunto='Correo enviado desde mi pagina';
			$mensaje_preparado="De: $nombre \n";
			$mensaje_preparado="Correo: $correo \n";
			$mensaje_preparado="Mensaje: ".$msj;

			//para mandar los datos por correo
			mail($enviar_a, $asunto, $mensaje_preparado);
			$enviado=true;

	}
	require 'views/contacto.view.php';

?>