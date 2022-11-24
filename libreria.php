<?php 
  session_start();

  require_once('controller/libreria.controller.php');
  $libreriaController = new LibreriaController;
  $juegoS = $libreriaController->ObtenerTableLibreriaByClienteId($_SESSION['clienteId']); 

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
    <link rel="stylesheet" href="styles/detallesTestStyle.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/ratingUpdateStyle.css">
    
    
</head>

<?php include('view/navbarBeta.php');?>


<div class="container mt-5 mb-5">

    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
        <h2 class="font-weight-bold py-3 mb-4">
      Libreria
    </h2>
            <?php foreach($juegoS as $juego){ ?>
              <div class="row p-2 bg-white border rounded mt-2">
                  <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?php echo $juego ['direccion_imagen'];?>"></div>
                  <div class="col-md-6 mt-1">
                      <h5><?php echo $juego['nombre'];?></h5>
                      <div class="d-flex flex-row">
                        <?php
                        $rating = $juego['rating_personal'];
                        include('view/rating.php');?>
                        <button class="btn btn-dark" data-libreriaid="<?php echo $juego['libreria_id']; ?>" data-rating="<?php echo $rating ?>"  type="button" data-toggle="modal" data-target="#exampleModal">Actualizar</button></a>
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

                      <div class="d-flex flex-column mt-2" style="display: flex; padding-top: 25%">
                        <a  href="descargarJuego.php?juegoId=<?php echo $juego['juego_id']?>">
                        <button class="btn btn-primary btn-sm mb-4"  type="button">Descargar</button></a>
                    </div>

                  </div>
              </div>
            <?php } ?>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="libreriaIdHidden" id="libreriaIdValor" hidden ></div>
        <h5 class="modal-title" id="exampleModalLongTitle">Actualiza tu Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
				//$ratingP = $juego['rating_personal'];
				include('view/ratingUpdate.php');
        
        //$newrating = getElementById('valueNewRating')->nodeValue;
        ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="window.location.href='actualizarRating.php?libreriaId='+document.getElementById('libreriaIdValor').innerText+'&nuevoRating='+document.getElementById('valueNewRating').innerText" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include('view/footer.html')?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="scripts/navbarTest3.js" ></script>
  <script src="scripts/ratingTest2.js"></script>

  <script>

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('rating') // Extract info from data-* attributes
  var libreriaId = button.data('libreriaid')
  console.log(libreriaId)
  
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  //modal.find('.modal-body input').val(recipient)
  modal.find('.myratings').text(recipient)
  modal.find('.libreriaIdHidden').text(libreriaId)

})
  </script>