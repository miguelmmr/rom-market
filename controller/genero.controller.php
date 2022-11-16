<?php
require_once('model/genero.model.php');

class GeneroController{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new GeneroModel();
    }
  
    public function ObtenerTableAllGeneros(){
        $tabla = $this->model->ObtenerTableAllGeneros();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerTableJuegoGeneroByJuegoId($juego_id){
        $tabla = $this->model->ObtenerTableJuegoGeneroByJuegoId($juego_id);
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }


}