<?php 
    session_start();

    require_once('controller/cliente.controller.php');
    $clienteController = new ClienteController;
    $cliente = $clienteController->ObtenerClienteById($_SESSION['clienteId']); 

    $clienteController->ActualizarSaldoClienteById($cliente['saldo']+$_POST['saldoExtra'], $_SESSION['clienteId']); 

    header('Location: profileBeta.php');
