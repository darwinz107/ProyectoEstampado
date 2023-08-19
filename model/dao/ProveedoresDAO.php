<?php
// autor: Meza Cedeño Maikel Danilo

require_once 'config/config.php';
require_once 'config/ConexionBD.php';

class ProveedoresDAO {
     private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }
     public function selectAll($parametro) {
        $sql = "SELECT * FROM proveedores WHERE prov_nombre LIKE :b1";
 
        //and prod_estado=1";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike);
        // ejecutar la sentencia
        $stmt->execute($data);
        //recuperar  resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultados;
    }


    public function selectOne($id) { // buscar un producto por su id
        $sql = "select * from proveedores where ".
        "prov_id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $proveedor = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $proveedor;
    }

    public function insert($prov){
        try{
        //sentencia sql
        $sql = "INSERT INTO proveedores ( prov_nombre, 	prov_telefono, 	
        prov_direccion, prov_precio, prov_plazo_entrega,prov_material,
        prov_mpago,fecha_actualizacion,
        usuario_actualizacion ) VALUES 
        ( :nom, :telefono, :direccion,:precio,:plazo_entrega, :material, :mpago, :usu, :fecha)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'nom' =>  $prov->getNombre(),
        'telefono' =>  $prov->getTelefono(),
        'direccion' =>  $prov->getDireccion(),
        'precio' =>  $prov->getPrecio(),
        'plazo_entrega' =>  $prov->getPlazoEntrega(),
        'material' =>  $prov->getMaterial(),
        'mpago' =>  $prov->getMPago(),
        'usu' =>  $prov->getUsuario(),
        'fecha' =>  $prov->getFechaActualizacion()
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

    public function update($prov){

        try{
            //prepare
            $sql = "UPDATE proveedores SET prov_nombre=:nom," .
                    "prov_telefono=:telefono,prov_direccion=:direccion,
                    prov_precio=:precio, prov_plazo_entrega=:plazo_entrega,
                    prov_material=:material,prov_mpago=:mpago,usuario_actualizacion=:usu," .
                    "fecha_actualizacion=:fecha WHERE prov_id=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' =>  $prov->getNombre(),
                'telefono' =>  $prov->getTelefono(),
                'direccion' =>  $prov->getDireccion(),
                'precio' =>  $prov->getPrecio(),
                'plazo_entrega' =>  $prov->getPlazoEntrega(),
                'material' =>  $prov->getMaterial(),
                'mpago' =>  $prov->getMPago(),
                'usu' =>  $prov->getUsuario(),
                'fecha' =>  $prov->getFechaActualizacion(),
                'id' =>  $prov->getId()
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

    public function delete($id) {
        try {
            // Preparar sentencia SQL de eliminación
            $sql = "DELETE FROM proveedores WHERE prov_id=:id";
            
            // Preparar la sentencia
            $sentencia = $this->con->prepare($sql);
            
            // Asociar el ID
            $data = [
                'id' => $id
            ];
            
            // Ejecutar la sentencia
            $sentencia->execute($data);
            
            // Verificar si se eliminó correctamente
            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        
        return true;
    }
    
}
?>

<?php
session_start();

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
         
    if (!empty($_SESSION['Role']) && $_SESSION['Role'] != 'Administrador') {
        $_SESSION['mensaje'] = "Acceso no autorizado a la página de Administrador.";
        header("Location: Index.php?c=index&f=index&p=Login");
        die();
    }
?>