<?php 
session_start();
    require_once('controller/carro.controller.php');
    $carroController = new CarroController;
    $carroController->RegistrarCarro($_SESSION['clienteId'], $_GET['juegoId']); 
    header('Location: carro.php');

?>