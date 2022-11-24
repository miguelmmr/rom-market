<?php

    class LibreriaModel {
        
        /*---- Devuelve la lista de items en el carro de un cliente --*/
        public function ObtenerTableLibreriaByClienteId($clienteId){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij, libreria l where j.juego_id = ij.juego and ij.tipo_imagen = 'P' and l.juego_id = j.juego_id and l.cliente_id = ".$clienteId;
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        public function juegoEnLibreriaCliente($juegoId, $clienteId){
            include('connection.php');
            $stmt = "select * from libreria where juego_id = ".$juegoId." and cliente_id = ".$clienteId;
            $result = $conn->query($stmt);
            $rows=$result->fetch_all();

            if($rows){
                return $rows;
            }
            else{
                return 'error';
            }
        }

        public function ObtenerJuegoLibreriaById($libreria_id){
            include('connection.php');
            $stmt = "select * from libreria l, juego j where j.juego_id = l.juego_id and l.libreria_id = ".$libreria_id;
            $result = $conn->query($stmt);
            $row=$result->fetch_array();
            if($row){
                return $row;
            }
            else{
                return 'error';
            }
        }

        /*---- Registra juegos a la libreria de un cliente --*/
        public function RegistrarJuegosLibreria($clienteId, $juegosId){
            foreach($juegosId as $juegoId){
                include('connection.php');
                $stmt = "INSERT INTO `rom_market`.`libreria` (`cliente_id`, `juego_id`) VALUES ('".$clienteId."', '".$juegoId."');";
                $result = $conn->query($stmt);
            }
        }

        /*---- Elimina juego a la libreria de un cliente --*/
        public function EliminarJuegoLibreria($libreriaId){
            include('connection.php');
            $stmt = "DELETE FROM `rom_market`.`libreria` WHERE (`carro_id` =  '".$libreriaId."');";
            $result = $conn->query($stmt);

        }

        /*---- Actualiza rating personal  --*/
        public function actualizarRatingPersonalLibreria($libreriaId, $ratingNuevo ){
            include('connection.php');
            $stmt = "UPDATE `rom_market`.`libreria` SET `rating_personal` = '".$ratingNuevo."' WHERE (`libreria_id` = '".$libreriaId."');";
            $result = $conn->query($stmt);

        }


    }
?>