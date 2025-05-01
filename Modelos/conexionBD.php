<?php

class ConexionBD {

    static public function cBD() {
        $bd = new PDO("mysql:host=localhost;dbname=crud_php", "root", ""); // <-- aquí

        $bd->exec("set names utf8");

        return $bd;
    }

}