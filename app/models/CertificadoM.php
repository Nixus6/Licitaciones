<?php

include("conexionCERT.php");

class Certificado
{

    private $cnx;

    function __construct()
    {
        session_start();
    }

    function ConsultarCertificado()
    {
        $cnx  = new conexionCert;
        $seguimiento = $cnx->conectar();
        $sentencia = $seguimiento->query("SELECT * FROM certificados");
        $row = $sentencia->fetchAll();
        return $row;
    }
}
