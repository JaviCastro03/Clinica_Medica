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

    public function eliminarMedico($id){
        $sql="DELETE FROM medicos WHERE id=:id";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);

        $sql2="UPDATE usuarios SET rol=1 where id=:id";
        $consulta2 = $this->conexion->prepare($sql2);
        $consulta2->bindParam(':id', $id);


        if($consulta->execute() && $consulta2->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function getMedicosAdmin($email){
        if($email=='') {
            $sql = "SELECT * FROM medicos";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
        }
        else{
            $sql = "SELECT * FROM medicos where email = :email";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(':email', $email);
            $consulta->execute();

        }
        if($consulta->rowCount()>0){
            return $consulta;
        }
        else{
            return null;
        }

    }
    public function actualizarDatosMedico($apellidos, $nombre, $idU,$direccion,$telefono,$cp){
        $sql = "UPDATE medicos SET apellidos=:apellidos,nombre=:nombre,direccion=:direccion,telefono=:telefono,cp=:cp where id = :idU";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':idU', $idU);
        $consulta->bindParam(':direccion', $direccion);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':cp', $cp);
        if($consulta->execute()){
            return true;
        }
        else{
            return false;
        }

    }
}