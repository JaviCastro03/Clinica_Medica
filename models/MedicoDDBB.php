<?php

class MedicoDDBB
{
    private $conexion;
    public function __construct(){
        $this->conexion = ConexionDB::getConexion("clinica");

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

    function getMedicosEspecialidad($idespecialidad){
        $sql = "SELECT id, nombre, apellidos, email FROM medicos WHERE idEspecialidad = $idespecialidad";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        if($consulta->rowCount() > 0){
            return $consulta;
        }
        else{
            return null;
        }

    }
}