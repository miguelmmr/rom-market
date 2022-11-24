<?php 
  session_start();

  require_once('controller/libreria.controller.php');
  $libreriaController = new LibreriaController;
  $juego = $libreriaController->ObtenerJuegoLibreriaById($_GET['libreriaId']);
  $libreriaController->actualizarRatingPersonalLibreria($_GET['libreriaId'], $_GET['nuevoRating']);

  $cantRating = $juego['cant_rating'];

  if ($juego['rating_personal'] == 0){
    $cantRating = $cantRating + 1;
    $nuevoRating = ($juego['cant_rating']*$juego['rating'] + $_GET['nuevoRating'])/($cantRating);
  }
  else{
    if($cantRating == 0){$cantRating=1;}
    $nuevoRating = ($juego['cant_rating']*$juego['rating'] - $juego['rating_personal'] + $_GET['nuevoRating'])/($cantRating);
  }

  require_once('controller/juego.controller.php');
  $juegoController = new JuegoController;
  $juegoController->actualizarRatingJuego($juego['juego_id'], $nuevoRating, $cantRating); 

  header('Location: libreria.php');
