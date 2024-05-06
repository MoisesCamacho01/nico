<?php

namespace core;

use Config\Config;
use core\catch\Files;

class Nico{

    private $config;

    function __construct(){
        $this->config = new Config();
    }

    public function asset(string $file):string{
        return Files::getFile($file);
    }

    public function app(){
                
    }
    
    
}