<?php
// autor:Meza Cedeño Maikel Danilo
require_once 'model/dao/CategoriasDAO.php';
require_once 'model/dto/Categoria.php';

class CategoriasController {

    private $model;
    
    public function __construct() {// constructor
        $this->model = new CategoriasDAO();
    }

    // funciones del controlador
    public function index() {
        $resultados = $this->model->selectAllxParam("");
        // comunicarnos a la vista
        $titulo="Buscar Categorias";
        require_once VCATEGORIAS.'list.php';
          
    }

    public function search(){
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
       //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAllxParam($parametro);
       // comunicarnos a la vista
       $titulo="Buscar Categorias";
       require_once VCATEGORIAS.'list.php';
    }

    // muestra el formulario de nuevo producto
    public function view_new(){
        //comunicarse con el modelo
        // Comunicarse con la vista
        $titulo = "Nueva Categoria";
        require_once VCATEGORIAS . 'new.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            // considerar verificaciones
            //if(!isset($_POST['codigo'])){ // redireccionar header('');}
            $cat = new Categoria();

            // lectura de parametros
            $cat->setNombre(htmlentities($_POST['nombre']));
            $cat->setDescripcion(htmlentities($_POST['descripcion']));
            $estado = (isset($_POST['estado'])) ? 1 : 0; // ejemplo de dato no obligatorio
            $cat->setEstado($estado);
            $cat->setUsuario('usuario'); //$_SESSION['usuario'];
            $fechaActual = new DateTime('NOW');
            $cat->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
        
            //comunicar con el modelo
            $exito = $this->model->insert($cat);

            $msj = 'Categoria guardada exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=Categorias&f=index');
        } 
    }

    public function delete() {
        // Leer parámetros
        $id = htmlentities($_GET['id']); // Asegúrate de que el parámetro esté en GET, ya que estás usando enlaces
    
        // Comunicarse con el modelo para eliminar la categoría
        $exito = $this->model->delete($id);
    
        $msj = 'Categoria eliminada exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar la Categoria";
            $color = "danger";
        }
        
        if (!isset($_SESSION)) {
            session_start();
        };
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
    
        // Llamar a la vista
        header('Location:index.php?c=categorias&f=index');
    }
    
    


    // muestra el formulario de editar producto
    public function view_edit(){
        //leer parametro
        $id= $_REQUEST['id']; // verificar, limpiar
        //comunicarse con el modelo de productos
        $cat = $this->model->selectOne($id);
        //comunicarse con el modelo de categorias
        //$modeloCat = new CategoriasDAO();
        //$categorias = $modeloCat->selectAll();
        

        // comunicarse con la vista
        $titulo="Editar producto";
        require_once VCATEGORIAS.'edit.php';

    }


    

    // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
            // verificaciones
                //if(!isset($_POST['codigo'])){ header('');}
                // leer parametros
                $cat = new Categoria();
                $cat->setId(htmlentities($_POST['id']));
                $cat->setNombre(htmlentities($_POST['nombre']));
                $cat->setDescripcion(htmlentities($_POST['descripcion']));
                $estado = (isset($_POST['estado'])) ? 1 : 0; // un dato no requerido
                $cat->setEstado($estado);
                $cat->setUsuario('usuario'); //$_SESSION['usuario'];
                $fechaActual = new DateTime('NOW');
                $cat->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
            
                //llamar al modelo
                $exito = $this->model->update($cat);
                
                $msj = 'Categoria actualizada exitosamente';
                $color = 'primary';
                    if (!$exito) {
                        $msj = "No se pudo realizar la actualizacion";
                        $color = "danger";
                    }
                    if(!isset($_SESSION)){ 
                        session_start();
                    };
                $_SESSION['mensaje'] = $msj;
                $_SESSION['color'] = $color;
                
                //llamar a la vista
                header('Location:index.php?c=categorias&f=index');
        
        } 
    }
}
