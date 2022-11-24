<?php
	require_once('controller/genero.controller.php');
  	$generoC = new GeneroController;
  	$generos = $generoC->ObtenerTableAllGeneros();  

	  if (isset($_SESSION['user'])){
		  require_once('controller/carro.controller.php');
  		$carroController = new CarroController;
  		$cantidadJuegosCarro = $carroController->ObtenerCantJuegosCarro($_SESSION['clienteId']); 

      require_once('controller/cliente.controller.php');
      $clienteController = new ClienteController;
      $saldoCliente = $clienteController->ObtenerSaldoByClienteId($_SESSION['clienteId']); 
    
	  }
?>

<header class="header-area overlay">

  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="inicio.php">
        <h1 class="main-header__title">ROM MARKET</h1>
      </a>
      <!-- Buscador y carrito -->
      <div class="d-flex justify-content-lg-between justify-content-end position-absolute"
        style="bottom:12px;width:100%">

        <form class="form-inline" action="busqueda.php" >
          <div class="input-group search-box" style="margin: auto; margin-left: 20px">
            <input type="text"  name="search" class="form-control" placeholder="Busca Juegos" aria-label="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" style="height: 31px;" type="submit"><i class="fa fa-search"
                  style="color: white; font-size:24px"></i></button>
            </span>
          </div>
        </form>



        <div class="col-md-18" style="margin-right: 7%; " >
          <?php if (empty($_SESSION['user'])){ ?>
          <a class="btn btn-outline-success " href="login.html" type="button"><i class="fa fa-user"></i> Login / Signup</a>
          <?php }
				  else {?>

            <a class="text-reset col-md-9" style="margin-left: 20px; height: 100px; color: red" href="carro.php">
              <span><i class="fa fa-shopping-cart" style="font-size:24px; color: white;"></i></span>
              <span class="badge rounded-pill badge-notification bg-danger"
                style="font-size:16px"><?php echo $cantidadJuegosCarro ?></span>
            </a>

          <ul class="navbar-nav ml-auto" style=" ">
            <li class="dropdown">
              <a href="#" class="nav-item nav-link" data-toggle="dropdown"><?php echo $_SESSION['user']."  S/.".$saldoCliente ?></a>
              <div class="dropdown-menu">
                <a href="profileBeta.php" class="dropdown-item">Configuracion</a>
                <a href="model/logout.php" class="dropdown-item">Salir Session</a>
              </div>
            </li>
          </ul>

          
          <?php } ?>

        </div>

      </div>
      <!-- Opciones -->
      <div id="main-nav" class="d-none d-md-flex justify-content-lg-center justify-content-start" style="width:100%">
        <ul class="navbar-nav">
          <li><a href="inicio.php" class="nav-item nav-link active">Inicio</a></li>
          <li class="dropdown">
            <a href="#" class="nav-item nav-link" data-toggle="dropdown">Categorias</a>
            <div class="dropdown-menu">
              <?php foreach($generos as $genero){?>
              <a href="#" class="dropdown-item"><?php echo $genero['nombre']?></a>
              <?php }	?>
            </div>
          </li>

          <li><a href="libreria.php" class="nav-item nav-link">Libreria</a></li>
          <li><a href="wishlist.php" class="nav-item nav-link">Wishlist</a></li>
          <li><a href="#" class="nav-item nav-link">Soporte</a></li>
        </ul>
      </div>

    </div>

  </nav>
</header>