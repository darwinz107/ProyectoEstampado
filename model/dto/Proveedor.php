<?php
// autor:Meza Cedeño Maikel Danilo
class Proveedor {
    private $id_proveedor, $nombre, $telefono, $direccion,
            $precio,$plazo_entrega,$material,$mpago, $fecha_actualizacion, 
            $usuario_actualizacion;

    function __construct() {
        
    }

    function getId() {
        return $this->id_proveedor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getPlazoEntrega() {
        return $this->plazo_entrega;
    }

    function getMaterial() {
        return $this->material;
    }
    function getMPago() {
        return $this->mpago;
    }

    function getFechaActualizacion() {
        return $this->fecha_actualizacion;
    }

    function getUsuario() {
        return $this->usuario_actualizacion;
    }


    function setId($id) {
        $this->id_proveedor = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setPlazoEntrega($plazo_entrega) {
        $this->plazo_entrega = $plazo_entrega;
    }

    function setMaterial($material) {
        $this->material = $material;
    }
    function setMPago($mpago) {
        $this->mpago = $mpago;
    }

    function setFechaActualizacion($fechaActualizacion) {
        $this->fecha_actualizacion = $fechaActualizacion;
    }

    function setUsuario($usuarioActualizacion) {
        $this->usuario_actualizacion = $usuarioActualizacion;
    }

    public function __set($nombre, $valor) {
        if (property_exists('Proveedor', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Proveedor', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}

