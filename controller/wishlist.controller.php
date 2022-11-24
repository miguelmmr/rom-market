<?php
require_once('model/wishlist.model.php');

class WishlistController{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new WishlistModel();
    }
  
    public function ObtenerTableWishlistByClienteId($clienteId){
        $tabla = $this->model->ObtenerTableWishlistByClienteId($clienteId);
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function RegistrarJuegoWishlist($clienteId, $juegoId){
        $this->model->RegistrarJuegoWishlist($clienteId, $juegoId);

    }

    public function EliminarJuegoWishlist($wishlistId){
        $this->model->EliminarJuegoWishlist($wishlistId);

    }


}