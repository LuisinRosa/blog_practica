<?php  
	session_start();
	require 'config.php';
	require '../functions.php';
	comprobarSession();
	$conexion=conexion($db_config);
	if (!$conexion) {
		header('Location:../error.php');
	}
	$id=limpiarDatos($_GET['id']);
	if (!$id) {
		header('Location:'.RUTA.'/admin');
	}
	$eliminar=$conexion->prepare('DELETE FROM blog WHERE id=:id');
	$eliminar->execute(array(':id'=>$id));
	header('Location:'.RUTA.'/admin')
?>