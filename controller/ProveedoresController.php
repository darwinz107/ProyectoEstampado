<?php
// autor:Meza Cedeño Maikel Danilo
require_once 'model/dao/ProveedoresDAO.php';
require_once 'model/dto/Proveedor.php';

class ProveedoresController {

    private $model;
    
    public function __construct() {// constructor
        $this->model = new ProveedoresDAO();
    }

    // funciones del controlador
    public function index() {
        $resultados = $this->model->selectAll("");
        // comunicarnos a la vista
        $titulo="Buscar Proveedores";
        require_once VPROVEEDORES.'list.php';
          
    }

    public function search(){
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
       //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->model->selectAll($parametro);
       // comunicarnos a la vista
       $titulo="Buscar Proveedores";
       require_once VPROVEEDORES.'list.php';
    }

    // muestra el formulario de nuevo producto
    public function view_new(){
        //comunicarse con el modelo
        // Comunicarse con la vista
        $titulo = "Nuevo Proveedor";
        require_once VPROVEEDORES . 'new.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            // considerar verificaciones
            //if(!isset($_POST['codigo'])){ // redireccionar header('');}
            $prov = new Proveedor();

            // lectura de parametros
            $prov->setNombre(htmlentities($_POST['nombre']));
            $prov->setTelefono(htmlentities($_POST['telefono']));
            $prov->setDireccion(htmlentities($_POST['direccion']));
            $prov->setPrecio(htmlentities($_POST['precio']));
            $prov->setPlazoEntrega(htmlentities($_POST['plazo_entrega']));
            $prov->setMaterial(htmlentities($_POST['material']));
            $prov->setMPago(htmlentities($_POST['mpago']));
            $prov->setUsuario('usuario'); //$_SESSION['usuario'];
            $fechaActual = new DateTime('NOW');
            $prov->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
        
            //comunicar con el modelo
            $exito = $this->model->insert($prov);

            $msj = 'Proveedor guardado exitosamente';
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
            header('Location:index.php?c=proveedores&f=index');
        } 
    }

    public function delete() {
        // Leer parámetros
        $id = htmlentities($_GET['id']); // Asegúrate de que el parámetro esté en GET, ya que estás usando enlaces
    
        // Comunicarse con el modelo para eliminar la categoría
        $exito = $this->model->delete($id);
    
        $msj = 'Proveeodr eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar el Proveedor";
            $color = "danger";
        }
        
        if (!isset($_SESSION)) {
            session_start();
        };
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
    
        // Llamar a la vista
        header('Location:index.php?c=proveedores&f=index');
    }
    
    


    // muestra el formulario de editar producto
    public function view_edit(){
        //leer parametro
        $id= $_REQUEST['id']; // verificar, limpiar
        //comunicarse con el modelo de productos
        $prov = $this->model->selectOne($id);
        //comunicarse con el modelo de categorias
        //$modeloCat = new CategoriasDAO();
        //$categorias = $modeloCat->selectAll();
        

        // comunicarse con la vista
        $titulo="Editar Proveedor";
        require_once VPROVEEDORES.'edit.php';

    }


    

    // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
            // verificaciones
                //if(!isset($_POST['codigo'])){ header('');}
                // leer parametros
                $prov = new Proveedor();
                $prov->setId(htmlentities($_POST['id']));
                $prov->setNombre(htmlentities($_POST['nombre']));
                $prov->setTelefono(htmlentities($_POST['telefono']));
                $prov->setDireccion(htmlentities($_POST['direccion']));
                $prov->setPrecio(htmlentities($_POST['precio']));
                $prov->setPlazoEntrega(htmlentities($_POST['plazo_entrega']));
                $prov->setMaterial(htmlentities($_POST['material']));
                $prov->setMPago(htmlentities($_POST['mpago']));
                $prov->setUsuario('usuario'); //$_SESSION['usuario'];
                $fechaActual = new DateTime('NOW');
                $prov->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
            
                //llamar al modelo
                $exito = $this->model->update($prov);
                
                $msj = 'Proveedor actualizado exitosamente';
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
                header('Location:index.php?c=proveedores&f=index');
        
        } 
    }
}
