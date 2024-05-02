<?php 
require_once('./model/view-model.php');

class viewController extends viewModel{
    public function plantillaController(){
        return require_once('./resources/Layout/Layout.php');
    }

    public function optener_viewController(){
        if(isset($_GET['views'])){
            $ruta = explode('/', $_GET['views']);
            $respuesta = viewModel::optener_viewModel($ruta[0]);
        }else{
            $respuesta="index";
        }
        return $respuesta;
    }
}
