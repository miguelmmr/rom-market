<?php 
session_start();

    require_once('controller/cliente.controller.php');
    $clienteController = new ClienteController;
    $cliente = $clienteController->ObtenerClienteById($_SESSION['clienteId']); 

    if($cliente['saldo'] >= $_GET['precioTotal']){

        $clienteController->ActualizarSaldoClienteById($cliente['saldo']-$_GET['precioTotal'], $_SESSION['clienteId']); 

        require_once('controller/carro.controller.php');
        $carroController = new CarroController;
        $carroController->EliminarJuegosCarroByClienteId($_SESSION['clienteId']); 

        $listaJuegosId = explode(",", rtrim($_GET['juegosId'], ","));

        require_once('controller/libreria.controller.php');
        $libreriaController = new LibreriaController;
        $juegoS = $libreriaController->RegistrarJuegosLibreria($_SESSION['clienteId'], $listaJuegosId);
        
        header('Location: libreria.php');
    }
    else{
        header('Location: libreria.php?error=saldoInsuficiente');
    }

   


?>