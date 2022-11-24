<?php

    class WishlistModel {
        
        /*---- Devuelve la lista de items en el carro de un cliente --*/
        public function ObtenerTableWishlistByClienteId($clienteId){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij, wishlist w where j.juego_id = ij.juego and ij.tipo_imagen = 'P' and w.juego_id = j.juego_id and w.cliente_id = ".$clienteId;
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        /*---- Registra juego a la libreria de un cliente --*/
        public function RegistrarJuegoWishlist($clienteId, $juegoId){
            include('connection.php');
            $stmt = "INSERT INTO `rom_market`.`wishlist` (`cliente_id`, `juego_id`) VALUES ('".$clienteId."', '".$juegoId."');";
            $result = $conn->query($stmt);

        }

        /*---- Elimina juego a la libreria de un cliente --*/
        public function EliminarJuegoWishlist($wishlistId){
            include('connection.php');
            $stmt = "DELETE FROM `rom_market`.`wishlist` WHERE (`wishlist_id` =  '".$wishlistId."');";
            $result = $conn->query($stmt);

        }


    }
?>