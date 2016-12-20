<?php  
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion($db_config);
	if (!$conexion) {
		header('Location:error.php');
	}
	if ($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['busqueda'])) {
		$busqueda=limpiarDatos($_GET['busqueda']);
		$resultado=$conexion->prepare('SELECT * FROM blog where titulo like :busqueda or texto like :busqueda');
		$resultado->execute(array(':busqueda'=>"%$busqueda%"));
		$resultado=$resultado->fetchAll();
		if (empty($resultado)) {
			$titulo='No se encontraron articulos con el resultado: '.$busqueda;
		}else{
			$titulo='Resultados de la busqueda: '.$busqueda;
		}

	}else{
		header('Location: '.RUTA);
	}
	require 'views/buscar.view.php';
?>