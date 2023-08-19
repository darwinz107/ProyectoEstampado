<?php
// autor: Calderon Serrano Kleidy
class Producto {
    private $id_producto, $nombre, $descripcion, $precio,
            $id_categoria, $tipo_material, $disponibilidad,
            $fecha_actualizacion, $usuario_actualizacion, $caracteristica_destacada;

    function __construct() {
        
    }

    function getId() {
        return $this->id_producto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIdCategoria() {
        return $this->id_categoria;
    }

    function getTipoMaterial() {
        return $this->tipo_material;
    }

    function getDisponibilidad() {
        return $this->disponibilidad;
    }

    function getFechaActualizacion() {
        return $this->fecha_actualizacion;
    }

    function getUsuario() {
        return $this->usuario_actualizacion;
    }

    function getCaracteristicaDestacada() {
        return $this->caracteristica_destacada;
    }

    function setId($id) {
        $this->id_producto = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIdCategoria($idCategoria) {
        $this->id_categoria = $idCategoria;
    }

    function setTipoMaterial($tipoMaterial) {
        $this->tipo_material = $tipoMaterial;
    }

    function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad;
    }

    function setFechaActualizacion($fechaActualizacion) {
        $this->fecha_actualizacion = $fechaActualizacion;
    }

    function setUsuario($usuarioActualizacion) {
        $this->usuario_actualizacion = $usuarioActualizacion;
    }

    function setCaracteristicaDestacada($caracteristicaDestacada) {
        $this->caracteristica_destacada = $caracteristicaDestacada;
    }

    public function __set($nombre, $valor) {
        if (property_exists('Producto', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Producto', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}

