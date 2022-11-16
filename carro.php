<?php
  session_start();

  require_once('controller/carro.controller.php');
  $carroController = new CarroController;
  $juegoCarroCliente = $carroController->ObtenerTableCarroByClienteId($_SESSION['clienteId']); 
  $totalPrecio = 0;
  $totalAhorro = 0;
?>


<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="styles/navbarBetaStyle.css">
  <link rel="stylesheet" type="text/css" href="styles/sliderStyle.css">
  <link rel="stylesheet" type="text/css" href="styles/tests/carroTestStyle.css">
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

<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card" style="color: #685d5d;">
        <div class="card-header">
            <h2>Carro De Compras</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Juegos</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Precio</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Descuento</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">SubTotal</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php foreach($juegoCarroCliente as $juego){
                    $subtotalPrecio = $juego ['precio']*(100-$juego ['promocion'])/100;
                    $subtotalAhorro = $juego ['precio']*($juego ['promocion'])/100;
                    $totalPrecio = $totalPrecio + $subtotalPrecio;
                    $totalAhorro = $totalAhorro + $subtotalAhorro;
                    ?>
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="<?php echo $juego ['direccion_imagen'];?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark"><?php echo $juego['nombre'];?></a>

                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">$<?php echo $juego ['precio'];?></td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?php echo $juego ['promocion'];?>%</td>
                    <td class="text-right font-weight-semibold align-middle p-4">$<?php echo $subtotalPrecio; ?></td>
                    <td class="text-center align-middle px-0">
                      <a  href="removerCarro.php?carroId=<?php echo $juego['carro_id']?>">
                        <button type="button" class="btn btn-secondary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                      title="Remover Juego">
                    <i class="fa fa-trash"></i></button></a>
                    <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                    title="Mover a Wishlist">
                    <i class="fa fa-heart"></i>
                  </button></td>
                  </tr>
                <?php }?>
        
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
            <div class="mt-4">

              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Esta Ahorrando</label>
                  <div class="text-large"><strong>$<?php echo $totalAhorro;?></strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Precio Total</label>
                  <div class="text-large"><strong>$<?php echo $totalPrecio;?></strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
            <a  href="inicio.php"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3" href="inicio.php">Seguir Comprando</button></a>
              <button type="button" class="btn btn-success">Finalizar Compra</button>
            </div>
        
          </div>
      </div>
  </div>

  <?php include('view/footer.html')?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="scripts/navbarTest3.js" ></script>