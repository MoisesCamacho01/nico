<?php
class viewModel{
    
    protected function optener_viewModel($view){
        // palabras permitidas en la url
        require_once('./routes/Lista-Blanca.php');
        foreach($listwhite as $ruta=>$row){
            if($view == $ruta){
                if(file_exists($row)){
                    $contenido = $row;
                }else{
                    $contenido="index";
                }
            }else{
                $contenido = "404";
            }
        }
        return $contenido;
    }
} 