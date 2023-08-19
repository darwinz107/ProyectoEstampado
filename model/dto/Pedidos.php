<?php
// autor: Darwin Zambrano

class Pedido {
    private $id_pedido, $nombre_producto, $descripcion_pedido, $tipo_producto,
            $cantidad, $detalles_especiales, $fecha_entrega;

    function __construct() {
        
    }

    function getIdPedido() {
        return $this->id_pedido;
    }

    function getNombreProducto() {
        return $this->nombre_producto;
    }

    function getDescripcionPedido() {
        return $this->descripcion_pedido;
    }

    function getTipoProducto() {
        return $this->tipo_producto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getDetallesEspeciales() {
        return $this->detalles_especiales;
    }

    function getFechaEntrega() {
        return $this->fecha_entrega;
    }

    function setIdPedido($id) {
        $this->id_pedido = $id;
    }

    function setNombreProducto($nombre) {
        $this->nombre_producto = $nombre;
    }

    function setDescripcionPedido($descripcion) {
        $this->descripcion_pedido = $descripcion;
    }

    function setTipoProducto($tipo) {
        $this->tipo_producto = $tipo;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setDetallesEspeciales($detalles) {
        $this->detalles_especiales = $detalles;
    }

    function setFechaEntrega($fecha) {
        $this->fecha_entrega = $fecha;
    }

    public function __set($nombre, $valor) {
        if (property_exists('Pedido', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Pedido', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}