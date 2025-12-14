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

    function getMedicosEspecialidad($idespecialidad,$id){
        $sql = "SELECT id, nombre, apellidos, email FROM medicos WHERE idEspecialidad = :idespecialidad and id!=:id";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(":idespecialidad", $idespecialidad);
        $consulta->bindParam(":id", $id);
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



    public function existeMedico($id){
        $sql = "SELECT id FROM medicos WHERE id=$id";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        if($consulta->rowCount() > 0){
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
            $sql = "SELECT * FROM medicosº where email = :email";
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

    public function insertarMedico($id,$dni,$nombre,$apellidos,$email,$password,$rol,$idEspecialidad,$telefono,$direccion,$cp){
        $sql="INSERT INTO `medicos` (`id`, `dni`, `nombre`, `apellidos`, `email`, `password`, `rol`, `idEspecialidad`, `telefono`, `direccion`, `cp`) VALUES (:id, :dni, :nombre, :apellidos, :email, :password, :rol, :idEspecialidad, :telefono, :direccion, :cp) ";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':dni', $dni);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':password', $password);
        $consulta->bindParam(':rol', $rol);
        $consulta->bindParam(':idEspecialidad', $idEspecialidad);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':direccion', $direccion);
        $consulta->bindParam(':cp', $cp);

        if($consulta->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function getEspecialidades(){
        $sql="SELECT * FROM especialidades";
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