<?php

class CitaDDBB
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

    public function getHoras(){
        $sql="SELECT hora FROM horas";
        $consulta=$this->conexion->prepare($sql);
        $consulta->execute();
        if($consulta->rowCount()>0){
            return $consulta;
        }
        else{
            return null;
        }

    }

    public function getCitas($idU){
        $sql="SELECT especialidades.nombre nombreEspecialidad, medicos.nombre nombreMedico, medicos.apellidos, horas.hora, citas.fecha 
                FROM especialidades
                INNER JOIN citas on especialidades.id = citas.idEspecialidad
                INNER JOIN medicos on citas.idMedico = medicos.id
                INNER JOIN horas on citas.idhora = horas.id 
                where citas.idPaciente=:idU";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':idU',$idU);
        $consulta->execute();
        if($consulta->rowCount()>0){
            return $consulta;
        }
        else{
            return null;
        }
    }
}