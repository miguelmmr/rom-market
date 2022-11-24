<?php 
session_start();
    require_once('controller/wishlist.controller.php');
    $wishlistController = new WishlistController;
    $wishlistController->EliminarJuegoWishlist($_GET['wishlistId']); 
    header('Location: wishlist.php');

?>