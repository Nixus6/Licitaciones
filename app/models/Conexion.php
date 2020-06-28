<?php
const SERVER = "localhost";
const DB = "LicitacionesFinal";
const USER = "root";
const PASS = "";

const SGBD = "mysql:host=" . SERVER . ";dbname=" . DB;

class Conexion
{
    protected static function conectar()
    {
        $enlace = new PDO(SGBD, USER, PASS);
        return $enlace;
    }

}
