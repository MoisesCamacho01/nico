<?php 

spl_autoload_register(function($class){
    $file_name = str_replace('\\', '/', $class).".php";
    if(file_exists($file_name)){
        require_once($file_name);
    }
});