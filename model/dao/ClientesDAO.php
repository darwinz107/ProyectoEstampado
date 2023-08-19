<?php
// autor: Gutierrez Velez Luis
require_once 'config/config.php';
require_once 'config/ConexionBD.php';

class ClientesDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        // sql de la sentencia
      $sql = "SELECT * FROM clientes where (Nombres like :b1 or Apellidos like :b2)";
      $stmt = $this->con->prepare($sql);
      // preparar la sentencia
      $conlike = '%' . $parametro . '%';
      $data = array('b1' => $conlike, 'b2' => $conlike);
      // ejecutar la sentencia
      $stmt->execute($data);
      //recuperar  resultados
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //retornar resultados
      return $resultados;
  }

  public function selectOne($id) { // buscar un producto por su id
        $sql = "select * from clientes where ".
        "idCliente=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $cliente;
    }

    public function insert($prod){
        try{
        //sentencia sql
        $sql = "INSERT INTO clientes ( Nombres,  Apellidos, Genero, 
        Telefono, Email, Fecha_Registro) VALUES 
        ( :nom, :apell, :gen, :tel, :email, :fecha)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'nom' =>  $prod->getNombre(),
        'apell' =>  $prod->getApellido(),
        'gen' =>  $prod->getGenero(),
        'tel' =>  $prod->getTelefono(),
        'email' =>  $prod->getEmail(),
        'fecha' =>  $prod->getFechaRegistro()
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
           return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }

    public function update($prod){

        try{
            //prepare
            $sql = "UPDATE clientes SET Nombres=:nom," .
                    "Apellidos=:apell,Genero=:gen,Telefono=:tel,Email=:email," .
                    "Fecha_Registro=:fecha WHERE idCliente=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' =>  $prod->getNombre(),
                'apell' =>  $prod->getApellido(),
                'gen' =>  $prod->getGenero(),
                'tel' =>  $prod->getTelefono(),
                'email' =>  $prod->getEmail(),
                'fecha' =>  $prod->getFechaRegistro(),
                'id' =>  $prod->getId()
                ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
          echo $e->getMessage();
            return false;
        }
            return true;       
    }

    public function delete($prod){
        try {
            //prepare
            $sql = "DELETE FROM clientes WHERE idCliente = :id";
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' => $prod->getId()
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {
                //rowCount permite obtener el número de filas afectadas
                return false;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }
    
}
?>

<?php
if(!isset($_SESSION)) {session_start();} 

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['IdU'])) {
    // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("Location: Index.php?c=index&f=index&p=Login");
    exit();
}

// Ahora puedes continuar con el resto del contenido de la página
?>

<?php 
    if(!isset($_SESSION)) {session_start();}   
         
    if (!empty($_SESSION['Role']) && $_SESSION['Role'] != 'Cliente') {
        $_SESSION['mensaje'] = "Acceso no autorizado a la página de clientes.";
        header("Location: Index.php?c=index&f=index&p=Login");
        die();
    }
?>