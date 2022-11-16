<?php
	require_once('controller/genero.controller.php');
  	$generoC = new GeneroController;
  	$generos = $generoC->ObtenerTableAllGeneros();  

	  if (isset($_SESSION['user'])){
		require_once('controller/carro.controller.php');
  		$carroController = new CarroController;
  		$cantidadJuegosCarro = $carroController->ObtenerCantJuegosCarro($_SESSION['clienteId']); 
	  }
?>

  <header class="header-area overlay">

	<nav class="navbar navbar-expand-md navbar-dark">
		<div class="container-fluid">
			<a class="navbar-brand" style="padding-left: 300px;" href="inicio.php">
				<h1 class="main-header__title">ROM MARKET</h1>
			</a>
			
			<div id="main-nav" class="collapse navbar-collapse" style="padding-left: 300px;">
				<ul class="navbar-nav ml-auto">
					<li><a href="inicio.php" class="nav-item nav-link active">Inicio</a></li>
					<li class="dropdown">
						<a href="#" class="nav-item nav-link" data-toggle="dropdown">Categorias</a>
						<div class="dropdown-menu">
							<?php foreach($generos as $genero){?>
								<a href="#" class="dropdown-item"><?php echo $genero['nombre']?></a>
							<?php }	?>
						</div>
					</li>

					<li><a href="#" class="nav-item nav-link">Libreria</a></li>
					<li><a href="#" class="nav-item nav-link">Wishlist</a></li>
					<li><a href="#" class="nav-item nav-link">Soporte</a></li>
				</ul>
			</div>
		</div>

		<div class="cont-right" style="display: flex; flex-direction: column; ">

			<div class="cont-right-top"   style=" display: flex; margin-top: 20px; margin-left: 20%; padding-bottom: 20px;">
				<?php if (empty($_SESSION['user'])){ ?>
				<a class="btn btn-outline-success" href="login.html"  type="button"><i class="fa fa-user"></i>  Login / Signup</a>
				<?php }
				else {?>

				<li class="dropdown" style=" display: flex; margin-top: 10px; color: white;">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:12px; color: white;">  <?php echo $_SESSION['user'] ?>  </a>
					<ul class="dropdown-menu" style="color: white;" role="menu">
					<li><a style="font-size:12px; color: white;" href="#">settings</a></li>
					<li class="divider"></li>
					<li><a style="font-size:12px; color: white;" href="#">logout</a></li>
					</ul>
				</li>

				<a class="text-reset me-3" style="padding-left: 20px; "   href="carro.php">
					<span><i class="fa fa-shopping-cart" style="font-size:24px; color: white;"></i></span>
					<span class="badge rounded-pill badge-notification bg-danger" style="font-size:16px"><?php echo $cantidadJuegosCarro ?></span>
				</a>
				<?php } ?>

			</div>

			<form class="form-inline" action="busqueda.php">
				<div class= "input-group search-box" >
				<input type="text" name="search" class="form-control" placeholder="Busca Juegos" aria-label="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-secondary" type="submit"><i class="fa fa-search" style="color: white; font-size:24px"></i></button>
				</span>
				</div>
		  	</form>
		</div>

	</nav>
</header>