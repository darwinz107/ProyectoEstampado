<?php
// autor: Gutierrez Velez Luis
require_once 'model/dao/ClientesDAO.php';
require_once 'model/dto/Cliente.php';

class ClientesController {
    private $model;
    
    public function __construct() {// constructor
        $this->model = new ClientesDAO();
    }

    // funciones del controlador
    public function index() {
     
      //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectAll("");
      // comunicarnos a la vista
      $titulo="Buscar Clientes";
      require_once VCLIENTES.'list.php';
    
      
    }

    public function search(){
      // lectura de parametros enviados
      $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
     //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->model->selectAll($parametro);
     // comunicarnos a la vista
     $titulo="Buscar Clientes";
     require_once VCLIENTES.'list.php';
    }

    // muestra el formulario de nuevo producto
    public function view_new(){

          // comunicarse con la vista
          $titulo="Nuevo Cliente";
          require_once VCLIENTES.'nuevo.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
      //cuando la solicitud es por post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
          // considerar verificaciones
          //if(!isset($_POST['codigo'])){ // redireccionar header('');}
          $prod = new Cliente();
          // lectura de parametros
          $prod->setNombre(htmlentities($_POST['nombre']));
          $prod->setApellido(htmlentities($_POST['apellido']));
          $prod->setGenero(htmlentities($_POST['genero']));
          $prod->setTelefono(htmlentities($_POST['telefono']));
          $prod->setEmail(htmlentities($_POST['email']));
          $fechaRegistro = new DateTime('NOW');
          $prod->setFechaRegistro($fechaRegistro->format('Y-m-d H:i:s'));
        
          //comunicar con el modelo
          $exito = $this->model->insert($prod);

          $msj = 'Cliente guardado exitosamente';
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
          header('Location:index.php?c=clientes&f=index');
      } 
  }
  
  public function delete(){
      //leeer parametros
     $prod = new Cliente();
     $prod->setId(htmlentities($_REQUEST['id']));
     $fechaRegistro = new DateTime('NOW');
     $prod->setFechaRegistro($fechaRegistro->format('Y-m-d H:i:s'));
           
         //comunicando con el modelo
         $exito = $this->model->delete($prod);
        $msj = 'Cliente eliminado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo eliminar la actualizacion";
                $color = "danger";
            }
             if(!isset($_SESSION)){ session_start();};
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
        //llamar a la vista
          header('Location:index.php?c=clientes&f=index');
  }


   // muestra el formulario de editar producto
   public function view_edit(){
     //leer parametro
     $id= $_REQUEST['id']; // verificar, limpiar
     //comunicarse con el modelo de productos
    $prod = $this->model->selectOne($id);

    // comunicarse con la vista
    $titulo="Editar Cliente";
    require_once VCLIENTES.'edit.php';

  }

   // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
   public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
      // verificaciones
             //if(!isset($_POST['codigo'])){ header('');}
          // leer parametros
          $prod = new Cliente();
          $prod->setId(htmlentities($_POST['id']));
          $prod->setNombre(htmlentities($_POST['nombre']));
          $prod->setApellido(htmlentities($_POST['apellido']));
          $prod->setGenero(htmlentities($_POST['genero']));
          $prod->setTelefono(htmlentities($_POST['telefono']));
          $prod->setEmail(htmlentities($_POST['email']));
          $fechaRegistro = new DateTime('NOW');
          $prod->setFechaRegistro($fechaRegistro->format('Y-m-d H:i:s'));
        
          //llamar al modelo
          $exito = $this->model->update($prod);
          
          $msj = 'Cliente actualizado exitosamente';
          $color = 'primary';
          if (!$exito) {
              $msj = "No se pudo realizar la actualizacion";
              $color = "danger";
          }
           if(!isset($_SESSION)){ session_start();};
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
      //llamar a la vista
          header('Location:index.php?c=clientes&f=index');
         
      } 
   }
}
