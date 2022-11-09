<?php
	require_once('controller/genero.controller.php');
  	$generoC = new GeneroController;
  	$generos = $generoC->ObtenerTableAllGeneros();  
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

		<div class="cont-right" style="display: flex; flex-direction: column;">

		<div class="cont-right-top"   style=" margin: auto; padding-bottom: 20px; ">
			<?php if (empty($_SESSION['user'])){ ?>
			<a class="btn btn-outline-success" href="login.html"  type="button"><i class="fa fa-user"></i>  Login / Signup</a>
			<?php }
			else {?>
			<button class="btn btn-outline-success"  type="button"><i class="fa fa-user"></i>  <?php echo $_SESSION['user'] ?></button>

			<a class="text-reset me-3" style="padding-left: 20px; height: 100px;"   href="#">
				<span><i class="fa fa-shopping-cart" style="font-size:24px"></i></span>
				<span class="badge rounded-pill badge-notification bg-danger" style="font-size:16px">999</span>
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