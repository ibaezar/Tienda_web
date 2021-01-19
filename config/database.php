<?php

class Database{
    public static function connect(){
        $servidor = 'localhost:3308';
        $user = 'root';
        $pass = '';
        $nom_db = 'tienda_web';

        $db = new mysqli($servidor, $user, $pass, $nom_db);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}

?>