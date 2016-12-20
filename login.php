<?php 
	session_start(); 
	require 'admin/config.php';
	require 'functions.php';
	$errores="";
	$conexion=conexion($db_config);
	if (!$conexion) {
		header('Location:error.php');
	}

	

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$usuario=filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
	$password=hash('sha512',$_POST['password']);
		
	$statement=$conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password= :password');
	$statement->execute(array(':usuario' => $usuario,':password' => $password));
	$resultado=$statement->fetch();

	if ($resultado!=false) {
		$_SESSION['usuario']=$usuario;
		header('Location:'.RUTA.'/admin');
	} else {
		$errores.='<li>Usuario o contraseña incorrectos</li>';
		}	
	

}



	require 'views/login.view.php';
?>