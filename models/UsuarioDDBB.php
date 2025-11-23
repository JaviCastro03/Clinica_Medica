<?php


class UsuarioDDBB
{
    private $conexion;
    public function __construct(){
        $this->conexion = ConexionDB::getConexion("tienda");

    }

    public function getConexion(){
        return $this->conexion;
    }


    public function cerrarConexion() {
        if ($this->conexion) {
            $this->conexion=null;
        }
    }

    public function __destruct() {
        $this->cerrarConexion();
    }
}