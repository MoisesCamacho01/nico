<?php
class mainModel
{
    protected static function conexion(){
        $conexion = new PDO(SGBD, USER, PASS);
        $conexion->exec("set names utf8");
        return $conexion;
    }

    public static function consulta($consulta){
        $consulta = self::conexion()->prepare($consulta);
        $consulta->execute();
        return $consulta->fetch();
    }
    
    public static function consultaALL($consulta){
        $consulta = self::conexion()->prepare($consulta);
        $consulta->execute();
        return $consulta->fetchAll();
    }

    protected static function codigo_aleatorio($length){
        $charset = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codigo = "";

        for ($i = 0; $i < $length; $i++) {
            $rand = rand() % strlen($charset);
            $codigo .= substr($charset, $rand, 1);
        }
        return $codigo;
    }
    public static function codigo($length){
        $charset = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codigo = "";

        for ($i = 0; $i < $length; $i++) {
            $rand = rand() % strlen($charset);
            $codigo .= substr($charset, $rand, 1);
        }
        return $codigo;
    }

    public static function sql_inyeccion($cadena){
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_replace('/', '', $cadena);
        $cadena = str_replace('"', '', $cadena);
        $cadena = str_replace("'", '', $cadena);
        $cadena = str_replace("{", '', $cadena);
        $cadena = str_replace("}", '', $cadena);
        $cadena = str_replace("[", '', $cadena);
        $cadena = str_replace("]", '', $cadena);
        $cadena = str_replace("`", '', $cadena);
        $cadena = str_replace("^", '', $cadena);
        $cadena = str_replace("*", '', $cadena);
        $cadena = str_replace("+", '', $cadena);
        $cadena = str_replace("-", '', $cadena);
        $cadena = str_replace("<", '', $cadena);
        $cadena = str_replace(">", '', $cadena);
        $cadena = str_replace("=", '', $cadena);
        $cadena = str_replace("¨", '', $cadena);
        $cadena = str_replace("--", '', $cadena);
        $cadena = str_replace(".", '', $cadena);
        //$cadena = str_replace(" ", '', $cadena);
        $cadena = str_replace("$", '', $cadena);
        $cadena = str_replace("%", '', $cadena);
        $cadena = str_replace("&", '', $cadena);
        return $cadena;
    }
}
