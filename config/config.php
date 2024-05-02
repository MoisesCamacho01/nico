<?php 
/*

En este archivo se importa todo los archivos necesarios para
el uso adecuado de la aplicacion

NOTA: no modificar si no entiende el uso de los mismos

*/
/*
    DIRECCION DE LA RUTA
*/

const NAME = 'libro';
$url = './';
date_default_timezone_set('America/Guayaquil');
// constantes cache
const CSS = "./routes/css.php";
const JS = "./routes/javascript.php";
const COMPONENT = "./routes/components.php";
require_once($url.'config/cache/cache.php');
// AUTOLOAD  
spl_autoload_register(function($clase){
    require_once './'.str_replace('\\', '/', $clase).'.php';
});
//require_once($url.'config/conexion/configDB.php');
// CARGAMOS CONFIGURACION DE RUTAS
// include($url.'config/components/Component.php');
include($url.'config/rutas.php');
include($url.'config/auth/session.php');
include($url.'config/funciones.php');
include($url.'config/function/functions.php');

 

