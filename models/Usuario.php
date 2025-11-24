<?php



class Usuario
{

    private $dni;
    private $apellidos;
    private $nombre;

    private $email;
    private $password;
    private $rol;


    function __construct($dni,$apellidos,$nombre,$email,$password,$rol){
        $this->dni = $dni;
        $this->apellidos = $apellidos;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    function __get($atributo){
        return $this->$atributo;
    }
    function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    static function comprobarPassword($c1, $c2){
        if ($c1==$c2){
            return true;
        }
        else{
            return false;
        }
    }



}
