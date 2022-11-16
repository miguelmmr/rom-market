<?php
  session_start();

  require_once('controller/juego.controller.php');
  $juegoC = new JuegoController;
  $juego = $juegoC->ObtenerJuegoById($_GET['juego_id']); 

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/navbarBetaStyle.css">
    <link rel="stylesheet" type="text/css" href="styles/sliderStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rom Market</title>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:500">
    <link rel="stylesheet" type="text/css" href="styles/inicioStyle.css">
    <link href="styles/detallesTestStyle.css" rel="stylesheet">
    
</head>

<?php include('view/navbarBeta.php');?>

  <body>
	<div class="container" style="margin-bottom: 50px">
		<div class="card" style="color: #685d5d;">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php echo $juego ['direccion_imagen'];?>" /></div>

						</div>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $juego['nombre'];?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no"><?php echo $juego ['cant_rating'];?> reviews</span>
						</div>
						<p class="product-description"><?php echo $juego ['descripcion'];?></p>
						<h4 class="price"><span>$<?php echo $juego ['precio'];?></span></h4>

                        <div class="section" style="padding-bottom:20px;">
						<a  href="agregarCarro.php?juegoId=<?php echo $juego['juego_id']?>">
						<button class="btn btn-success" > Agregar al carro</button></a>
                        </div>    
					</div>
				</div>
			</div>
		</div>
	</div> 
    <?php include('view/footer.html')?>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="scripts/navbarTest3.js" ></script>
  <script src="scripts/rating.js"></script>
</html>