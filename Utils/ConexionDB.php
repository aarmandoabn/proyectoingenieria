<?php

class ConexionDB {
    public function getConexion(){
        $cnx = new PDO("mysql:host=localhost;dbname=tienda3","root","");
        return $cnx;
    }
}

