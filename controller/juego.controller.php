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

    public function ObtenerTableJuegosRecientes(){
        $tabla = $this->model->ObtenerTableJuegosRecientes();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }



}