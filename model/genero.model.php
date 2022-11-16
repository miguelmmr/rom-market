<?php

    class GeneroModel {
        
        /*----Devuelve todos los Juegos con su imagen principal--*/
        public function ObtenerTableAllGeneros(){
            include('connection.php');
            $stmt = "select * from genero";
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        public function ObtenerTableJuegoGeneroByJuegoId($juego_id){
            include('connection.php');
            $stmt = "select * from juego_genero jg, genero g where jg.genero_id = g.genero_id and jg.juego_id = ".$juego_id;
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }


    }
?>