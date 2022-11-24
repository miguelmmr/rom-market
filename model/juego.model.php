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

        /*----Devuelve lista de imagenes de carusel--*/
        public function ObtenerImagenesSlider(){
            include('connection.php');
            $stmt = "select * from imagen_juego ij, juego j where j.juego_id = ij.juego and ij.tipo_imagen = 'C' ";
            $result = $conn->query($stmt);
            $tabla = $result->fetch_all();
            if($tabla){
                return $tabla;
            }
            else{
                return 'error';
            }
        }

        /*----Devuelve lista de imagenes secundarias de un juego--*/
        public function ObtenerImagenesSecundariasJuegoById($juego_id){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'S' and juego_id = ".$juego_id;
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
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

        /*---- Actualiza rating total del juego  --*/
        public function actualizarRatingJuego($juegoId, $ratingNuevo, $cantRating){
            include('connection.php');
            $stmt = "UPDATE `rom_market`.`juego` SET `rating` = '".$ratingNuevo."', `cant_rating` = '".$cantRating."' WHERE (`juego_id` = '".$juegoId."');";
            $result = $conn->query($stmt);

        }
    }
?>