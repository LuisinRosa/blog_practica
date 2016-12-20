<?php require'header.php'; ?>
	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="titulo">Editar Articulo</h2>
				<form class="formulario" method="post"enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
					<input type="text" name="titulo" placeholder="Titulo del articulo" value="<?php echo $post['titulo']; ?>">
					<input type="text" name="extracto" placeholder="Extracto del articulo" value="<?php echo $post['estracto']; ?>">
					<textarea name="texto" placeholder="Texto del articulo"><?php echo $post['texto']; ?></textarea>
					<input type="file" name="foto">
					<input type="hidden" name="foto-guardada" value="<?php echo $post['foto']; ?>">
					<input type="submit" value="Editar Articulo">

				</form>
			</article>
		</div>
	</div>
	<?php require'../views/footer.php'; ?>