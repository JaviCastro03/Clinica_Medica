<?php


class UsuarioDDBB
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

    public function existeCorreo($correo){
        $sql = "SELECT id FROM usuarios WHERE email = :correo";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':correo', $correo);
        $consulta->execute();
        if($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            return true;
        }
        else{
            return false;
        }
    }

    public function setRol($email, $rol){
        try{
            $sql = "UPDATE usuarios SET rol=:rol WHERE email=:email";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':rol', $rol);
            $consulta->execute();
            return true;

        }
        catch (PDOException $e){
            $_SESSION["mensaje"] = "Error al cambiar rol: ".$e->getMessage();
            $_SESSION["mensaje"] = "Error al cambiar rol: ".$e->getMessage();
            return false;
        }

    }
    public function insertarUsuario($usuario)
    {
        try{
            $sql = "INSERT INTO usuarios (dni, apellidos, nombre, email, password, rol) 
            VALUES (:dni, :apellidos, :nombre, :email, :password, :rol)";
            $consulta = $this->conexion->prepare($sql);

            $dni = $usuario->dni;
            $apellidos = $usuario->apellidos;
            $nombre = $usuario->nombre;
            $email = $usuario->email;
            $password = $usuario->password;
            $rol = $usuario->rol;

            $consulta->bindParam(':dni', $dni);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':password', $password);
            $consulta->bindParam(':rol', $rol);

            return $consulta->execute();
        }
        catch (PDOException $e){
            $_SESSION['error']="Error: ".$e->getMessage();
        }

    }

}