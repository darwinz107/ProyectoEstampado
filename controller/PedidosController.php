<?php
// autor: Darwin Zambrano
require_once 'model/dao/PedidosDAO.php';

require_once 'model/dto/Pedidos.php';

class PedidosController {
    private $model;

    public function __construct() {
        $this->model = new PedidosDAO();
    }

    public function index() {
        $resultados = $this->model->selectAll("");
        $titulo = "Buscar pedidos";
       // require_once VPEDIDOS.'list.php';
    }
    
    public function search(){
        $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
        $resultados = $this->model->selectAll($parametro);
        $titulo = "Buscar pedidos";
        require_once VPEDIDOS.'list.php';
    }

 
    public function new() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pedido = new Pedido();
            $pedido->setNombreProducto(htmlentities($_POST['nombre_producto']));
            $pedido->setDescripcionPedido(htmlentities($_POST['descripcion_pedido']));
            $pedido->setTipoProducto(htmlentities($_POST['tipo_producto']));
            $pedido->setCantidad(htmlentities($_POST['cantidad']));
            $pedido->setDetallesEspeciales(htmlentities($_POST['detalles_especiales']));
            $pedido->setFechaEntrega(htmlentities($_POST['fecha_entrega']));
            $pedido->setUsuario('usuario');
            $fechaActual = new DateTime('NOW');
            $pedido->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));

            $exito = $this->model->insert($pedido);
            header('Location:index.php?c=Pedidos&f=index');
        }
    }

    public function delete(){
        $pedido = new Pedido();
        $pedido->setId(htmlentities($_REQUEST['id']));
        $pedido->setUsuario('usuario');
        $fechaActual = new DateTime('NOW');
        $pedido->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));

        $exito = $this->model->delete($pedido);
        header('Location:index.php?c=pedidos&f=index');
    }

    public function view_edit(){
        $id = $_REQUEST['id'];
        $pedido = $this->model->selectOne($id);

        $modeloCli = new ClientesDAO();
        $clientes = $modeloCli->selectAll();

        $titulo = "Editar pedido";
        require_once VPEDIDOS.'edit.php';
    }

    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pedido = new Pedido();
            $pedido->setId(htmlentities($_POST['id']));
            $pedido->setNombreProducto(htmlentities($_POST['nombre_producto']));
            $pedido->setDescripcionPedido(htmlentities($_POST['descripcion_pedido']));
            $pedido->setTipoProducto(htmlentities($_POST['tipo_producto']));
            $pedido->setCantidad(htmlentities($_POST['cantidad']));
            $pedido->setDetallesEspeciales(htmlentities($_POST['detalles_especiales']));
            $pedido->setFechaEntrega(htmlentities($_POST['fecha_entrega']));
            $pedido->setUsuario('usuario');
            $fechaActual = new DateTime('NOW');
            $pedido->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));

            $exito = $this->model->update($pedido);
            header('Location:index.php?c=pedidos&f=index');
        }
    }
}
?>