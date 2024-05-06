<?php

namespace core\catch;

use core\Core;

class Files extends Core{

    function __construct()
    {

    }

    private static function file(string $path):string{
        
        $url_public = Core::appUrl()."/{$_ENV['APP_FILE_PUBLIC']}";
        $path_public = __DIR__."/../../{$_ENV['APP_FILE_PUBLIC']}"; 
        
        if(!is_dir($path_public)){
            return "folder not exist";
        }

        if(!is_file("$path_public/$path")) return "file not exist";

        if(is_file("$path_public/$path")){
            $time = @filemtime("$path_public/$path");
            $path .= "?t=$time";
        }
        
        return "$url_public/$path";
    }

    public static function getFile(string $file):string{
        return self::file($file);
    }

}