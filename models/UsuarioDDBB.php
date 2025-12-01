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
            return false;
        }

    }

    public function emailExiste($email){

        $sql="SELECT id FROM Usuarios WHERE email=:email";
        $consulta=$this->conexion->prepare($sql);
        $consulta->bindParam(':email',$email);
        $consulta->execute();
        if($fila=$consulta->fetch()){
            return true;
        }
        else{
            return false;
        }




    }
    public function getUsuario($email)
    {
        $sql = "SELECT dni, apellidos, nombre, email, password,rol FROM usuarios WHERE email = :email";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':email', $email, PDO::PARAM_STR);
        $consulta->execute();

        $fila = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $usuario = new Usuario(
                $fila['dni'],
                $fila['apellidos'],
                $fila['nombre'],
                $fila['email'],
                $fila['password'],
                $fila['rol']
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public function actualizarPassword($email, $password){
        $sql = "UPDATE usuarios SET password=:password WHERE email = :email";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':password', $password);
        $consulta->bindParam(':email', $email);
        return $consulta->execute();
    }

    public function actualizarDatosUsuario($dni, $apellidos, $nombre, $idU){
        $sql = "UPDATE usuarios SET dni=:dni,apellidos=:apellidos,nombre=:nombre where id = :idU";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':dni', $dni);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':idU', $idU);
        if($consulta->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function getInfoUsuario($idU){
        $sql = "SELECT * FROM usuarios WHERE id = :idU";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':idU', $idU);
        $consulta->execute();
        if($consulta->rowCount()>0){
            return $consulta;
        }
        else{
            return null;
        }
    }
    public function getIDUsuario($email)
    {
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':email', $email, PDO::PARAM_STR);
        $consulta->execute();

        $fila = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return $fila['id'];
        } else {
            return null;
        }
    }
    public function getRol($email)
    {
        $sql = "SELECT rol FROM usuarios WHERE email = :email";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':email', $email);
        $consulta->execute();

        $fila = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return $fila['rol'];
        } else {
            return null;
        }
    }

    public function getEmail($idUsuario)
    {
        $sql = "SELECT email FROM usuarios WHERE id = :idUsuario";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':idUsuario', $idUsuario);
        $consulta->execute();
        if ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            return $fila['email'];
        } else {
            return null;
        }
    }
    public function getNombreUsuario($idUsuario){
        $sql = "SELECT nombre FROM usuarios WHERE id = :idUsuario";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':idUsuario', $idUsuario);
        $consulta->execute();
        if ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            return $fila['nombre'];
        }
        else{
            return null;
        }
    }


}
