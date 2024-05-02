<?php
// FILTRO DE SEGURIDAD
if(isset($_GET['c'])){
    $ruta_modelo = '../Api/SCRIPTPHP/model/';
    require_once('../Api/SCRIPTPHP/controllers/'.$_GET['c'].'.php');
        
    $controlador = $_GET['c'];
    $funcion = $_GET['f'];//convierte al ala variable array en string [funcion] => funcion
    $ejecutar = new $controlador();
    $a = $ejecutar -> $funcion();
        
    echo $a;
}else{

    if(isset($_POST['controller'])){
    
        $ruta_modelo = '../Api/SCRIPTPHP/model/';
        require_once('../Api/SCRIPTPHP/controllers/'.$_POST['controller'].'.php');
        
        $controlador = $_POST['controller'];
        $funcion = $_POST['funcion'];//convierte al ala variable array en string [funcion] => funcion
        $ejecutar = new $controlador();
        $a = $ejecutar -> $funcion();
        
        echo $a;
        
    }else{
        header('Location: index');
    }
}
exit();