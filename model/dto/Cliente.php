<?php
// autor: Gutierrez Velez Luis
class Cliente {
    //properties
    private $id, $nombre, $apellido, $genero, 
    $telefono, $email, $fechaRegistro;

    function __construct() {
        
    }

   function getId() {
        return $this->id;
    }

   
    function getNombre() {
        return $this->nombre;
    }


    function getApellido() {
        return $this->apellido;
    }

    function getGenero() {
        return $this->genero;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function setId($id) {
        $this->id = $id;
    }


    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

  
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }
    
    // Methods get y set parametrizados
    public function __set($nombre, $valor) {
        // Verifica que la propiedad exista
        if (property_exists('Cliente', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
      // Verifica que exista la propiedad
        if (property_exists('Cliente', $nombre)) {
            return $this->$nombre;
        }
// Retorna null si no existe
        return NULL;
    }

    
    
}
