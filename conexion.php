<?php

    class Conexion{
        private static $connect;
        public static function getConexion(){

            if( !isset(self::$connect) ){
                self::$connect = new \PDO("mysql:host=localhost;dbname=proyecto-daw","root","");
                return self::$connect;
            }else{
                return self::$connect;
            }          
        }
    }

?>