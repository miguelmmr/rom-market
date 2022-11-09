<?php 
  session_start();

  require_once('controller/juego.controller.php');
  $juegoC = new JuegoController;
  $juegoS = $juegoC->ObtenerTableJuegosBySearch($_GET['search']); 

    foreach($juegoS as $juego){
        echo $juego['nombre'];
        echo '<br>';
    }






?>