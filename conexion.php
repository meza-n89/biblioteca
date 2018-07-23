<?php
class Conexion{
    function __construct() {
        
    }
    public static function conexion(){
        $conexion=new PDO('mysql:host=localhost;dbname=libreria','root','');
        return $conexion;
    }
}
?>