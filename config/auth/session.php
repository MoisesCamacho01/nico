<?php
function Acceso(){
    if(!$_SESSION['session']){
        $ruta=dominio('index');
        header('Location:'.$ruta);
    }
}
