<?php 
session_start();
    require_once('controller/carro.controller.php');
    $carroController = new CarroController;
    $carroController->EliminarCarro($_GET['carroId']); 
    header('Location: carro.php');

?>