<?php
namespace config;

class Config{

    // Ruta al archivo .env
    protected $envFile = __DIR__."/../.env";
    protected $lang = "es";
    protected $timeZone = "America/Guayaquil";

    function __construct(){
        $this->getEnvFile();
    }

    private function getEnvFile(){
        // Verifica si el archivo .env existe
        if (file_exists($this->envFile)) {
            // Lee el contenido del archivo .env
            $envContent = file_get_contents($this->envFile);
            
            // Divide el contenido en líneas
            $envLines = explode("\n", $envContent);
            
            // Itera sobre cada línea
            foreach ($envLines as $line) {
                
                if(!empty($line) && strlen($line)>1){
                    // Divide la línea en nombre y valor (separados por el signo igual)
                    list($key, $value) = explode('=', $line, 2);
                    
                    // Asigna la variable de entorno solo si hay un nombre y un valor
                    if ($key && $value) {
                        $_ENV[$key] = trim($value); // Guarda la variable de entorno
                        putenv("$key=$value"); // Establece la variable de entorno
                    }
                }
                
            }
        }
    }
}
