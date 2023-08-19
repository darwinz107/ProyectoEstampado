<?php
// autor: Calderon Serrano Kleidy
require_once 'model/dao/ProductosDAO.php';
require_once 'model/dao/CategoriasDAO.php';
require_once 'model/dto/Producto.php';

class ProductosController {
    private $model;
    
    public function __construct() {// constructor
        $this->model = new ProductosDAO();
    }
    // funciones del controlador
    public function index() {
        //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAll("");
        // comunicarnos a la vista
        $titulo = "Buscar productos";
        require_once VPRODUCTOS.'list.php';
    }
    
    public function search(){
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
        $resultados = $this->model->selectAll($parametro);
        $titulo = "Buscar productos";
        require_once VPRODUCTOS.'list.php';
    }

    // muestra el formulario de nuevo producto
    public function view_new(){
        $modeloCat = new CategoriasDAO();
        $categorias = $modeloCat->selectAll();
        // comunicarse con la vista
        $titulo = "Nuevo producto";
        require_once VPRODUCTOS.'nuevo.php';
    }
    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prod = new Producto();
            $prod->setNombre(htmlentities($_POST['nombre']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setPrecio(htmlentities($_POST['precio']));
            $prod->setIdCategoria(htmlentities($_POST['categoria']));
            $prod->setTipoMaterial(htmlentities($_POST['tipo_material']));
            $desc = isset($_POST['disponibilidad']) ? 1 : 0;
            $prod->setDisponibilidad($desc);
            $prod->setCaracteristicaDestacada(htmlentities($_POST['caracteristica_destacada']));
            $prod->setUsuario('usuario');
            $fechaActual = new DateTime('NOW');
            $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
        
            //comunicar con el modelo
            $exito = $this->model->insert($prod);
            header('Location:index.php?c=Productos&f=index');
        } 
    }
  
    public function delete(){
        $prod = new Producto();
        $prod->setId(htmlentities($_REQUEST['id']));
        $prod->setUsuario('usuario');
        $fechaActual = new DateTime('NOW');
        $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
            
        $exito = $this->model->delete($prod);
        header('Location:index.php?c=productos&f=index');
    }

    // muestra el formulario de editar producto

    public function view_edit(){
        $id = $_REQUEST['id'];
        $prod = $this->model->selectOne($id);

        $modeloCat = new CategoriasDAO();
        $categorias = $modeloCat->selectAll();

        $titulo = "Editar producto";
        require_once VPRODUCTOS.'edit.php';
    }
     // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prod = new Producto();
            $prod->setId(htmlentities($_POST['id']));
            $prod->setNombre(htmlentities($_POST['nombre']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setPrecio(htmlentities($_POST['precio']));
            $prod->setIdCategoria(htmlentities($_POST['categoria']));
            $prod->setTipoMaterial(htmlentities($_POST['tipo_material']));
            $desc = isset($_POST['disponibilidad']) ? 1 : 0;
            $prod->setDisponibilidad($desc);
            $prod->setCaracteristicaDestacada(htmlentities($_POST['caracteristica_destacada']));
            $prod->setUsuario('usuario');
            $fechaActual = new DateTime('NOW');
            $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
        
            $exito = $this->model->update($prod);
            header('Location:index.php?c=productos&f=index');
        } 
    }
}
?>

