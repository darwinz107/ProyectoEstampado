<?php
// autor: Meza Cedeño Maikel Danilo

require_once 'config/config.php';
require_once 'config/ConexionBD.php';

class CategoriasDAO {
     private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }
     public function selectAll() {
        // sql de la sentencia
        $sql = "select * from categoria where cat_estado=1";
        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retorna cada fila como un objeto de una clase anonima
        // cuyos nombres de atributos son iguales a los nombres de las columnas retornadas
        // retorna datos para el controlador
        return $resultados;
    }
    
    public function selectAllxParam($parametro) {
        $sql = "SELECT * FROM categoria WHERE cat_nombre LIKE :b1";
 
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
        $sql = "select * from categoria where ".
        "cat_id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $producto;
    }

    public function insert($cat){
        try{
        //sentencia sql
        $sql = "INSERT INTO categoria ( cat_nombre, cat_descripcion,  cat_estado,
        cat_usuarioActualizacion, cat_fechaActualizacion) VALUES 
        ( :nom, :descripcion, :estado, :usu, :fecha)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'nom' =>  $cat->getNombre(),
        'descripcion' =>  $cat->getDescripcion(),
        'estado' =>  $cat->getEstado(),
        'usu' =>  $cat->getUsuario(),
        'fecha' =>  $cat->getFechaActualizacion()
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

    public function update($cat){

        try{
            //prepare
            $sql = "UPDATE categoria SET cat_nombre=:nom," .
                    "cat_descripcion=:descripcion,cat_estado=:estado, 
                     cat_usuarioActualizacion=:usu," .
                    "cat_fechaActualizacion=:fecha WHERE cat_id=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' =>  $cat->getNombre(),
                'descripcion' =>  $cat->getDescripcion(),
                'estado' =>  $cat->getEstado(),
                'usu' =>  $cat->getUsuario(),
                'fecha' =>  $cat->getFechaActualizacion(),
                'id' =>  $cat->getId()
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
            $sql = "DELETE FROM categoria WHERE cat_id=:id";
            
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
    $rolesPermitidos = array('Administrador', 'Gerente');
    if (!empty($_SESSION['Role']) && !in_array($_SESSION['Role'], $rolesPermitidos)) {// validacion de acceso segun rol de usuario
        // si no es administrador o gerente 
        header("Location: Index.php?c=index&f=index&p=Login");
        die();
    }
?>