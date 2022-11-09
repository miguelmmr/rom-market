<?php

    class JuegoModel {
        
        /*----Devuelve todos los Juegos con su imagen principal--*/
        public function ObtenerTableAllJuegos(){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'P'";
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        /*----Devuelve un juego segun el id dado--*/
        public function ObtenerJuegoById($juego_id){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'P' and juego_id = ".$juego_id;
            $result = $conn->query($stmt);
            $row=$result->fetch_array();
            if($row){
                return $row;
            }
            else{
                return 'error';
            }
        }

         /*----Devuelve un juego por busqueda--*/
         public function ObtenerTableJuegosBySearch($search){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'P' and j.nombre like '%".$search."%'";
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        /*----Devuelve todos los Juegos con su imagen principal ordenado por fecha lanzamiento--*/
        public function ObtenerTableJuegosRecientes(){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'P' order by j.fecha_lanzamiento desc limit 4";
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        /*----Devuelve todos los Juegos con su imagen principal ordenado por fecha lanzamiento--*/
        public function ObtenerTableMejoresJuegos(){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'P' order by j.rating desc limit 4";
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