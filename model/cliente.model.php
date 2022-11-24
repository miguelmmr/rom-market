<?php

    class ClienteModel {
        
        /*----Devuelve todos los Juegos con su imagen principal--*/
        public function ObtenerSaldoByClienteId($clienteId){
            include('connection.php');
            $stmt = "select * from cliente where cliente.cliente_id = ".$clienteId;
            $result = $conn->query($stmt);
            $row=$result->fetch_array();
            if($row){
                return $row['saldo'];
            }
            else{
                return 'error';
            }
        }

        public function ObtenerClienteById($clienteId){
            include('connection.php');
            $stmt = "SELECT * from persona p, cliente c where c.persona_id = p.persona_id and c.cliente_id = ".$clienteId;
            $result = $conn->query($stmt);
            $row=$result->fetch_array();
            if($row){
                return $row;
            }
            else{
                return 'error';
            }
        }

        public function ActualizarSaldoClienteById($saldo, $clienteId){
            include('connection.php');
            $stmt = "UPDATE `rom_market`.`cliente` SET `saldo` = '".$saldo."' WHERE (`cliente_id` = '".$clienteId."');";
            $result = $conn->query($stmt);
        }


    }
?>