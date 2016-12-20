<?php require'header.php'; ?>

	<div class="contenedor">
		<?php foreach ($resultado as $post):?>
			<div class="post">
				<article>
					<h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2>
					<p class="fecha"><?php echo fecha($post['fecha']); ?></p>
					<div class="thumb">
						<a href="single.php?id=<?php echo $post['id']; ?>">
							<img src="<?php echo RUTA;?>/imagenes/<?php echo $post['foto']; ?>" alt="">
						</a>
					</div>
					<p class="estracto"><?php echo $post['estracto']; ?></p>
					<a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar leyendo</a>
				</article>
			</div>
		<?php endforeach ?>
		 
		
		<?php require'paginacion.php'; ?>
	</div>
	<?php require'footer.php'; ?>
