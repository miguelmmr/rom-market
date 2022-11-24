<?php

	require_once('controller/juego.controller.php');
	$juegoC = new JuegoController;
	$juegosCarusel = $juegoC->ObtenerImagenesSlider(); 
?>

<div class="carousel-container" style="margin-bottom: 20px">
	<div
		id="carouselExampleIndicators"
		class="carousel slide"
		data-ride="carousel"
		style="width: 98.9vw; height: calc(100vh - 173px)">
		<ol class="carousel-indicators">
			<li
				data-target="#carouselExampleIndicators"
				data-slide-to="0"
				class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" style="height: 100%">
		<?php for ($i=0; $i<3; $i++){?>
			<div class="carousel-item <?php if($i==0){echo 'active';} ?>">
				<a href="detalles.php?juego_id=<?php echo $juegosCarusel[$i][2];?>"><img
					class="d-block"
					style="width: 100vw;"
					src="<?php echo $juegosCarusel[$i][1]; ?>"
					alt="First slide" /></a>
				<div class="carousel-caption d-none d-md-block"></div>
			</div>
			<?php } ?>

		</div>
		<a
			class="carousel-control-prev"
			href="#carouselExampleIndicators"
			role="button"
			data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a
			class="carousel-control-next"
			href="#carouselExampleIndicators"
			role="button"
			data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
