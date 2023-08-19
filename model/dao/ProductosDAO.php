<?php
// autor: Calderon Serrano Kleidy
require_once 'config/config.php';
require_once 'config/ConexionBD.php';


class ProductosDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
       $sql = "SELECT * FROM productos, categoria WHERE id_categoria = cat_id AND 
          (nombre LIKE :b1 OR cat_nombre LIKE :b2)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function selectOne($id) {// buscar un producto por su id
        $sql = "SELECT * FROM productos WHERE id_producto = :id";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        // retornar resultados
        return $producto;
    }

    public function insert($prod) {
        try {
            //sentencia sql
            $sql = "INSERT INTO productos (nombre, descripcion, precio, id_categoria, tipo_material, disponibilidad, fecha_actualizacion, usuario_actualizacion, caracteristica_destacada)
                    VALUES (:nom, :desc, :precio, :idCat, :tipoMat, :disp, :fecha, :usu, :caracDest)";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' => $prod->getNombre(),
                'desc' => $prod->getDescripcion(),
                'precio' => $prod->getPrecio(),
                'idCat' => $prod->getIdCategoria(),
                'tipoMat' => $prod->getTipoMaterial(),
                'disp' => $prod->getDisponibilidad(),
                'fecha' => $prod->getFechaActualizacion(),
                'usu' => $prod->getUsuario(),
                'caracDest' => $prod->getCaracteristicaDestacada()
            ];
            $sentencia->execute($data);
            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function update($prod) {
        try {
            //prepare
            $sql = "UPDATE productos SET nombre=:nom, descripcion=:desc, precio=:precio, id_categoria=:idCat, tipo_material=:tipoMat, disponibilidad=:disp, fecha_actualizacion=:fecha, usuario_actualizacion=:usu, caracteristica_destacada=:caracDest WHERE id_producto=:id";
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' => $prod->getNombre(),
                'desc' => $prod->getDescripcion(),
                'precio' => $prod->getPrecio(),
                'idCat' => $prod->getIdCategoria(),
                'tipoMat' => $prod->getTipoMaterial(),
                'disp' => $prod->getDisponibilidad(),
                'fecha' => $prod->getFechaActualizacion(),
                'usu' => $prod->getUsuario(),
                'caracDest' => $prod->getCaracteristicaDestacada(),
                'id' => $prod->getId()
            ];
            //execute
            $sentencia->execute($data);
              //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }
    public function delete($prod) {
        try {
            // Prepare the SQL query
            $sql = "DELETE FROM productos WHERE id_producto=:id";
            
            // Prepare the statement
            $sentencia = $this->con->prepare($sql);
            
            // Bind the parameters
            $data = [
                'id' => $prod->getId()
            ];
            
            // Execute the query
            $sentencia->execute($data);
            
            // Check if the deletion was successful
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
    $rolesPermitidos = array('Administrador', 'Gerente');
    if (!empty($_SESSION['Role']) && !in_array($_SESSION['Role'], $rolesPermitidos)) {// validacion de acceso segun rol de usuario
        // si no es administrador o gerente 
        header("Location: Index.php?c=index&f=index&p=Login");
        die();
    }
?>
