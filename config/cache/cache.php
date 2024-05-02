<?php
    function URL($name, $type){
      if(isset($_GET['views'])){
        $ruta = explode('/', $_GET['views']);
      }else{
        $ruta=[];
      }
      if($type == "css"){
        include(CSS);
          if(file_exists(CSS)){
              if(array_key_exists($name, $URLCSS)){
                return $URLCSS[''.$name.''];
              }else{
                $custom = "./resources/css/style/custom/".$name.'.css';
                $global = "./resources/css/style/Global/".$name.'.css';
                
                if(file_exists($custom) && file_exists($global)){
                  return "name";
                }elseif (file_exists($custom) && !file_exists($global)) {
                  return $custom;
                }elseif (!file_exists($custom) && file_exists($global)) {
                  return $global;
                }else{
                  return "";
                }
              }
              
          }else{
              return("ERROR");
          }
      }elseif($type == "js"){
        include(JS);
          if(file_exists(JS)){
            if(array_key_exists($name, $URLSCRIPT)){
              return $URLSCRIPT[''.$name.''];
            }else{
              $custom = "./resources/js/scripts/custom/".$name.'.js';
              $global = "./resources/js/scripts/Global/".$name.'.js';
              if(file_exists($custom) && file_exists($global)){
                return "name";
              }elseif (file_exists($custom) && !file_exists($global)) {
                return $custom;
              }elseif (!file_exists($custom) && file_exists($global)) {
                return $global;
              }else{
                return "";
              }
            }  
          }else{
            return("ERROR");
          }
      }
    }

    function load_css($file){
      $URL = URL($file,'css');
      if(($URL != "ERROR")&&($URL != "")&&($URL!="name")){
        if (is_file($URL)) {
          $t = @filemtime($URL);
        }  
        if(isset($t)){
          $URL .= '?t='.$t;
          print '<link href="'.dominio($URL).'" rel="stylesheet" type="text/css">';
        }else{
          $tipo="Error";
          $titulo="No encontramos el archivos";
          $msm="Verifica que la ruta o el nombre estén bien escritos <br>Nombre del archivo no encontrado: <b>".$file."</b>";
          
          error_system($tipo, $titulo, $msm);
        }
        
      }elseif ($URL == "ERROR"){
        $tipo="Error";
          $titulo="No encontramos el archivo javascript";
          $msm="Verifica que el archivo <b>css</b> este en la carpeta <b>routes</b>";
          error_system($tipo, $titulo, $msm);
      }elseif ($URL == ""){
        $tipo="Error";
        $titulo="No encontramos el archivo";
        $msm= <<<EOT
        Verifica que el archivo <b>{$file}</b> este en la carpeta <b>js->custom</b> o <b>js->Global</b>. o que la ruta del archivo este especificada en el archivo <b>css</b> de la carpeta routes.
        EOT;
        error_system($tipo, $titulo, $msm);
      }elseif($URL == "name"){
        $tipo="Error";
        $titulo="Archivos duplicados";
        $msm = <<<EOT
        Existen un archivo con el mismo nombre <b>{$file}</b> en la carpeta <b>Global</b> y <b>custom</b>. Por favor cambia el nombre del archivo. 
        EOT;
        error_system($tipo, $titulo, $msm);
      }
    }

    function load_js($file){
      $URL = URL($file,'js');
      if(($URL != "ERROR")&&($URL != "")&&($URL!="name")){
        if(is_file($URL)) {
          $t = @filemtime($URL);
        }
        
        if(isset($t)){
          $URL .= '?t='.$t;
          print '<script type="text/javascript" src="'.dominio($URL).'"></script>';
        }else{
          $tipo="Error";
          $titulo="No encontramos el archivo";
          $msm="Verifica que la ruta o el nombre estén bien escritos <br>Nombre del archivo no encontrado: <b>".$file."</b>";
          
          error_system($tipo, $titulo, $msm);
        }
        
      }elseif ($URL == "ERROR"){
        $tipo="Error";
        $titulo="No encontramos el archivo javascript";
        $msm="Verifica que el archivo <b>JavaScript</b> este en la carpeta <b>routes</b>";
          
        error_system($tipo, $titulo, $msm);
      }elseif ($URL == ""){
        $tipo="Error";
        $titulo="No encontramos el archivo";
        $msm= <<<EOT
        Verifica que el archivo <b>{$file}</b> este en la carpeta <b>js->custom</b> o <b>js->Global</b>. o que la ruta del archivo este especificada en el archivo <b>javascript</b> de la carpeta routes.
        EOT;
        error_system($tipo, $titulo, $msm);
      }elseif($URL == "name"){
        $tipo="Error";
        $titulo="Archivos duplicados";
        $msm = <<<EOT
        Existen un archivo con el mismo nombre <b>{$file}</b> en la carpeta <b>Global</b> y <b>custom</b>. Por favor cambia el nombre del archivo.
        EOT;
        error_system($tipo, $titulo, $msm);
      }
    }

    function load_file($file)
    {
      if (is_file($file)) {
        $t = @filemtime($file);
      }
      if (isset($t)) {
        $file .= '?t='.$t;
      }else{
        $tipo="Error";
        $titulo="No encontramos el archivo";
        $msm="Verifica que la ruta o el nombre del archivo estén bien escritos. <br> <b>".$file."</b>";
        error_system($tipo, $titulo, $msm);
      }
      print dominio($file);
    }
