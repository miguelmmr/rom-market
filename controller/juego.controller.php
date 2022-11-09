<?php
require_once('model/juego.model.php');

class JuegoController{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new JuegoModel();
    }
  
    public function ObtenerTableAllJuegos(){
        $tabla = $this->model->ObtenerTableAllJuegos();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerJuegoById($juego_id){
        $fila = $this->model->ObtenerJuegobyId($juego_id);
        if($fila=='error'){
            echo('error');
        }
        else{
            return $fila;
        }
    }

    public function ObtenerTableJuegosBySearch($search){
        $tabla = $this->model->ObtenerTableJuegosBySearch($search);
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerTableJuegosRecientes(){
        $tabla = $this->model->ObtenerTableJuegosRecientes();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerTableMejoresJuegos(){
        $tabla = $this->model->ObtenerTableMejoresJuegos();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }


}