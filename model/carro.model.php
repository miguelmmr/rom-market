<?php

    class CarroModel {
        
        /*---- Devuelve la lista de items en el carro de un cliente --*/
        public function ObtenerTableCarroByClienteId($clienteId){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij, carro c where j.juego_id = ij.juego and ij.tipo_imagen = 'P' and c.juego_id = j.juego_id and c.cliente_id = ".$clienteId;
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        /*----Devuelve la cantidad de juegos en el carro de un cliente--*/
        public function ObtenerCantJuegosCarro($clienteId){
            include('connection.php');
            $stmt = "select count(c.carro_id) from carro c where c.estado = 'A' and c.cliente_id = ".$clienteId;
            $result = $conn->query($stmt);
            $row=$result->fetch_array();
            return $row[0];

        }

        /*---- Registra juego al carro de un cliente --*/
        public function RegistrarCarro($clienteId, $juegoId){
            include('connection.php');
            $stmt = "INSERT INTO `rom_market`.`carro` (`cliente_id`, `juego_id`, `estado`) VALUES ('".$clienteId."', '".$juegoId."', 'A');";
            $result = $conn->query($stmt);

        }
    }
?>