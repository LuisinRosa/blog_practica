<?php  require 'header.php';?>
	<div class="contenedor">
		<div class="post">
			<h2>Contactame</h2>
			<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<input type="text" name="nombre" placeholder="Nombre" required>
				<input type="email" name="email" placeholder="Correo" required>
				<textarea name="mensaje" placeholder="Mensaje" required></textarea>
				<input type="submit" value="Enviar correo">
			</form>
		</div>
	</div>
<?php require 'footer.php'; ?>