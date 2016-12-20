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
			$id=id_articulo($_POST['id']);
			$titulo=limpiarDatos($_POST['titulo']);
			$extracto=limpiarDatos($_POST['extracto']);
			$texto=$_POST['texto'];
			$foto=$_FILES['foto']['tmp_name'];

			if (empty($foto)) {
				$fotoG=$_POST['foto-guardada'];
			}else{
			$archivo_subido='../'.$blog_config['carpeta_imagenes'].$_FILES['foto']['name'];
			move_uploaded_file($foto,$archivo_subido);
			$fotoG=$_FILES['foto']['name'];
			}

			$nuevoPost=$conexion->prepare('UPDATE blog SET titulo = :titulo,
														   estracto= :extracto,
														   fecha= :fecha,
														   texto= :texto,
														   foto= :foto
															WHERE id= :id');
			$nuevoPost->execute(array(
										':titulo'=>$titulo,
										':extracto'=>$extracto,
										':fecha'=>date("Y/m/d"),
										':texto'=>$texto,
										':foto'=>$fotoG,
										':id'=>$id));
			header('Location:'.RUTA.'/admin');

	}else{
		$id=id_articulo($_GET['id']);

		if (empty($id)) {
		header('Location:index.php');
		}

		$post=obtener_pos_por_id($conexion,$id);
		if (!$post) {
			('Location:index.php');
		}
		$post=$post[0];
		require '../views/editar.view.php';
	}
	//require '../views/editar.view.php';
?>