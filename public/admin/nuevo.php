<?php  
	session_start();
	require 'config.php';
	require '../functions.php';
	comprobarSession();
	$conexion=conexion($db_config);
	if (!$conexion) {
		header('Location:../error.php');
	}
	if ($_SERVER['REQUEST_METHOD']=='POST') {
			$titulo=limpiarDatos($_POST['titulo']);
			$extracto=limpiarDatos($_POST['extracto']);
			$texto=$_POST['texto'];
			$foto=$_FILES['foto']['tmp_name'];

			$archivo_subido='../'.$blog_config['carpeta_imagenes'].$_FILES['foto']['name'];
			move_uploaded_file($foto,$archivo_subido);

			$nuevoPost=$conexion->prepare('INSERT INTO blog(titulo,estracto,fecha,texto,foto)
								VALUES (:titulo,:extracto,:fecha,:texto,:foto)');
			$nuevoPost->execute(array(
										':titulo'=>$titulo,
										':extracto'=>$extracto,
										':fecha'=>date("Y/m/d"),
										':texto'=>$texto,
										':foto'=>$_FILES['foto']['name']));
			header('Location:'.RUTA.'/admin');

	}
	require '../views/nuevo.view.php';
?>