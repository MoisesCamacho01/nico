<?php
/*LIBRERIAS*/
session_start();
//require_once('config/cache/cache.php');
require_once('./config/config.php');
/*===============*/

/*===============*/
//URL es una variable qeu nos ayuda en las rutas

//Incluimos el header
require_once('./controllers/view-controller.php');
$vt = new viewController();
$viewC = $vt->optener_viewController();

@$page = explode('/', $_GET['views']);

if(($page[0] == "404")||($viewC=="404")){
    // MANEJAMOS LOS ERRORES DEL SERVIDOR
    $contar_caracter_slash = substr_count($page[0],"/");
    if($contar_caracter_slash > 0){
        header('Location: '.dominio('404'));
    }else{
        $errorSV = str_replace('/','',$page[0]);
        require_once('./config/Lista_errors_server.php');
        if(in_array($errorSV, $list_errors_server)){
            require_once('./errors/'.$errorSV.'.php');
        }else{
            require_once('./errors/404.php');
            
        }
    }
    
}else{
    // ACCESO PERMITIR O NO;
    // if(($page=="")||($page=="index")||($page=="login")||($page=="crearCuenta")){
    // }else{
    //     Acceso();
    // }
    // ==================
    //INCLUIMOS LAS CABECERAS BASE 
    require_once('./resources/Layout/universal.php');
    // ============================================================================
    //CAJAS FLOTANTES EVENTOS CLICK O DOBLE CLICK
    // Estas cajas son mensajes o secciones flotantes para editar un contenido sin ///la necesidad de recargar la pagina.
    require_once('./resources/Layout/cajasFlotantes/notificaciones.php');
    // ============================================================================
    //CABEZERA
    require_once('./resources/Layout/header.php');
    // CONTENIDO
    if(($page[0]=="index")||($page[0]=="")){
        echo "<section class='gridContainer'>";
            require_once('./App/views/home/views/index.php');
        echo "</section>";
        // FIN CONTENIDO
        //INCLUIMOS EL FOOTER
        require_once('./resources/Layout/footer.php');
    }elseif(($page[0]!="index")||($page[0]!="")){
        // AQUI ES EL CUERPO DE LAS PAGINAS
        echo "<section class='gridContainer'>";
            require_once($viewC);
        echo "</section>";
        echo $viewC;
        // FIN CONTENIDO
        //INCLUIMOS EL FOOTER
        require_once('./resources/Layout/footer.php');
    }

}
exit;