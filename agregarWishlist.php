<?php 
session_start();
    require_once('controller/wishlist.controller.php');
    $wishlistController = new WishlistController;
    $wishlistController->RegistrarJuegoWishlist($_SESSION['clienteId'], $_GET['juegoId']); 
    header('Location: wishlist.php');

?>