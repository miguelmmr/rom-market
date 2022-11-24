<?php

    echo 'prueba';
    echo '<br>';
    /*
    $conn= new mysqli("localhost","root","1212","rom_market");
    mysqli_set_charset($conn,"utf8");


    $stmt = "select * from imagen_juego ij, juego j where j.juego_id = ij.juego and ij.tipo_imagen = 'C' ";
    $result = $conn->query($stmt);
    $tabla=$result->fetch_all();*/

    require_once('controller/juego.controller.php');
	$juegoC = new JuegoController;
	$juegosCarusel = $juegoC->ObtenerImagenesSlider(); 
	echo $juegosCarusel[0][0];

    echo '<br>';

    for ($i=0; $i<3; $i++){
        echo $juegosCarusel[$i][1];
        echo '<br>';
    }



    //$row = $tabla[0];
    //echo $tabla[0][0];
    echo '<br>';
    //echo sizeof($rows)

    /*foreach($rows as $r){
        echo $r[0];
        echo '<br>';
    }*/

    
?>

