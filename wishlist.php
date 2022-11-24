<?php 
  session_start();

  require_once('controller/wishlist.controller.php');
  $wishlistController = new WishlistController;
  $juegoS = $wishlistController->ObtenerTableWishlistByClienteId($_SESSION['clienteId']); 

  require_once('controller/genero.controller.php');
  $generoController = new GeneroController;
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
    <link rel="stylesheet" type="text/css" href="styles/tests/listaJuegosStyle.css">
    
</head>

<?php include('view/navbarBeta.php');?>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
        <h2 class="font-weight-bold py-3 mb-4">
      Wishlist
    </h2>
            <?php foreach($juegoS as $juego){ ?>
              <div class="row p-2 bg-white border rounded mt-2">
                  <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?php echo $juego ['direccion_imagen'];?>"></div>
                  <div class="col-md-6 mt-1">
                      <h5><?php echo $juego['nombre'];?></h5>
                      <div class="d-flex flex-row">
                          <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span><?php echo $juego ['cant_rating'];?></span>
                      </div>
                        <div class="mt-1 mb-1 spec-1">
                      <?php
                      $generosDelJuego = $generoController->ObtenerTableJuegoGeneroByJuegoId($juego ['juego_id']);
                      foreach($generosDelJuego as $genero){ ?>
                        <span class="dot"></span><span><?php echo $genero ['nombre'];?> </span>
                      <?php } ?>
                      </div>
                      <p class="text-justify text-truncate para mb-0"><?php echo $juego ['descripcion'];?><br><br></p>
                  </div>
                  <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                      <div class="d-flex flex-row align-items-center">
                      <h4 class="mr-1">S/.<?php echo $juego ['precio']*(100-$juego ['promocion'])/100;?></h4>
                      <?php if ($juego ['promocion'] != 0){ ?>
                      <span class="strike-text">S/.<?php echo $juego ['precio'];?></span>
                      <?php } ?>
                      </div>
                      <div class="d-flex flex-column mt-2" style="display: flex; padding-top: 5%">
                        <button class="btn btn-primary btn-sm mb-4"  type="button">Detalles</button>
                    </div>
                    <div class = "buttons-search" style="display: flex; margin-left: 30%">
                        <a  href="removerWishlist.php?wishlistId=<?php echo $juego['wishlist_id']?>" >
                        <button type="button" class="btn btn-secondary" style="display: flex; margin-left: 0%" data-mdb-toggle="tooltip"
                            title="Remover de Wishlist">
                            <i class="fa fa-trash"></i></button></a>
                        <a  href="agregarCarro.php?juegoId=<?php echo $juego['juego_id']?>" >
                        <button type="button" class="btn btn-success" style="display: flex; margin-left: 75%" data-mdb-toggle="tooltip"
                            title="Agregar a Carro">
                            <i class="fa fa-cart-plus"></i></button></a>
                    </div>
                  </div>
              </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include('view/footer.html')?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="scripts/navbarTest3.js" ></script>