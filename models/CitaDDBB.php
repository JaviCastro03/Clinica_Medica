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

    public function getHoras($idMedico, $dia){
        $sql="SELECT horas.hora
        FROM horas
        where hora not in(SELECT horas.hora 
        FROM horas
        inner join citas
        ON citas.idhora=horas.id
        where citas.idMedico = :idMedico and citas.fecha = :dia)";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':idMedico',$idMedico);
        $consulta->bindParam(':dia',$dia);
        $consulta->execute();
        if($consulta->rowCount()>0){
            return $consulta;
        }
        else{
            return null;
        }

    }

    public function getCitas($idU){
        $sql="SELECT especialidades.nombre nombreEspecialidad, medicos.nombre nombreMedico, medicos.apellidos, horas.hora, citas.fecha,citas.estado 
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

    public function getIdHora($hora){
        $sql="SELECT id FROM horas where hora=:hora";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':hora',$hora);
        $consulta->execute();
        if($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
            return $fila["id"];
        }else{
            return null;
        }
    }

    public function insertarCita($idPaciente,$idMedico,$fecha,$hora,$estado,$idespecialidad){
        $sql="INSERT INTO citas (idPaciente,idMedico,fecha,idhora,estado,idespecialidad) values (:idPaciente,:idMedico,:fecha,:hora,:estado,:idespecialidad)";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':idPaciente',$idPaciente);
        $consulta->bindParam(':idMedico',$idMedico);
        $consulta->bindParam(':fecha',$fecha);
        $consulta->bindParam(':hora',$hora);
        $consulta->bindParam(':estado',$estado);
        $consulta->bindParam(':idespecialidad',$idespecialidad);
        if($consulta->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function setEstado($estado,$idCita){
        $sql="UPDATE citas SET estado=:estado WHERE id=:idCita";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':estado',$estado);
        $consulta->bindParam(':idCita',$idCita);
        if($consulta->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getIdCita($idMedico, $idHora, $fecha){
        $sql="SELECT id from citas where idMedico = :idMedico and idhora=:idHora and fecha=:fecha";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':idMedico',$idMedico);
        $consulta->bindParam(':idHora',$idHora);
        $consulta->bindParam(':fecha',$fecha);
        $consulta->execute();
        if($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
            return $fila['id'];
        }else{
            return null;
        }
    }
}