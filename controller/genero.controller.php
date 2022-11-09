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




}