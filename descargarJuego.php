<?php

//session_start();

require_once('controller/juego.controller.php');
$juegoController = new JuegoController;
$juego = $juegoController->ObtenerJuegoById($_GET['juegoId']);

$zipName =  $juego['direccion_descarga'].".zip";

$filePath = 'ftp://guest_rom_market:1212@127.0.0.1/'.$zipName;
if(file_exists($filePath)){
    // Define headers
    $handle = fopen($filePath, 'rb');

    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=\"" . basename($zipName) . "\"");
    header("Content-Transfer-Encoding: binary");
    echo stream_get_contents($handle);

    fclose($handle);

}else{
    header("location: inicio.php?descarga=error");
}

?>