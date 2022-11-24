<?php 
session_start();
    require_once('controller/carro.controller.php');
    $carroController = new CarroController;
    $carroController->EliminarJuegoCarro($_GET['carroId']); 
    header('Location: carro.php');

?>