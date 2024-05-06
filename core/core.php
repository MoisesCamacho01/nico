<?php

namespace core;

class Core{
    
    protected function appUrl():string {
        return (substr($_ENV['APP_URL'], -1) == '/') ? substr_replace($_ENV['APP_URL'],'', -1) : $_ENV['APP_URL'];
    }
}