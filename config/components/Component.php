<?php
namespace config\component;

class Component{
  
  private $ruta;

  function __construct()
  {
    $this->ruta="./App/components/";
  }
  
  public function Component($name, $category=""){
    
    if(!empty($category)){
      $this->ruta.=$category.$name.".php";
    }else{
      include(COMPONENT);
      // echo COMPONENT;
      if(file_exists(COMPONENT)){
        if(array_key_exists($name, $COMPONENT)){
          $this->ruta = $COMPONENT[$name];
        }else{
          $tipo="Error";
          $titulo="No encontramos el archivo";
          $msm="Verifica que la ruta o el nombre estén bien escritos. Nombre del archivo no encontrado: <b>{$name}</b>";
          error_system($tipo, $titulo, $msm);
        }
      }else{
        $tipo="Error";
        $titulo="No se encuentra el archivo";
        $msm="Verifica que el archivo <b>component.php</b> este en la carpeta routes";
        error_system($tipo, $titulo, $msm);
      }
    }
    if(file_exists($this->ruta)){
      if(!is_dir($this->ruta)){
        return $this->ruta;
      }
    }else{
      $tipo="Error";
      $titulo="No encontramos el archivos";
      $msm="Verifica que la ruta o el nombre estén bien escritos. Nombre del archivo no encontrado: <b>{$name}</b>";
      error_system($tipo, $titulo, $msm);
    }
    
  }

  public function getRuta()
  {
    echo $this->ruta;
  }

}


