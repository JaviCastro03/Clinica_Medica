<?php

class InformesDDBB
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

    public function getInformes($idU){
        $sql="SELECT * FROM informes WHERE idPaciente=:idU";
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

    public function crearInforme($idPaciente, $idMedico, $motivo, $fecha,$diagnostico,$tratamiento){
        $sql = "INSERT INTO informes (idPaciente, idMedico, motivo, fecha, diagnostico,tratamiento) VALUES (:idPaciente, :idMedico, :motivo, :fecha, :diagnostico, :tratamiento)";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':idPaciente',$idPaciente);
        $consulta->bindParam(':idMedico',$idMedico);
        $consulta->bindParam(':motivo',$motivo);
        $consulta->bindParam(':fecha',$fecha);
        $consulta->bindParam(':diagnostico',$diagnostico);
        $consulta->bindParam(':tratamiento',$tratamiento);
        if($consulta->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function eliminarInforme($id){
        $sql = "DELETE FROM informes WHERE id = :idInforme";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':idInforme',$id);
        if($consulta->execute()){
            return true;
        }
        else{
            return false;
        }
    }


}