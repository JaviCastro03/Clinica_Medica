<?php

class EspecialidadDDBB
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

    public function getEspecialidades(){
        $sql = "SELECT nombre, descripcion From especialidades";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        if($consulta->rowCount() > 0){
            return $consulta;
        }
        else{
            return null;
        }

    }

    public function getId($nombre){
        $sql = "SELECT id FROM especialidades where nombre = :nombre";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':nombre',$nombre);
        $consulta->execute();
        if($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            return $fila["id"];
        }
        else{
            return null;
        }
    }
}