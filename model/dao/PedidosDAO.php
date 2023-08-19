<?php
// autor: Darwin Zambrano
require_once 'config/config.php';
require_once 'config/ConexionBD.php';

class PedidosDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        $sql = "SELECT * FROM pedidos WHERE nombre_producto LIKE :b1 OR descripcion_pedido LIKE :b2";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function selectOne($id) {
        $sql = "SELECT * FROM pedidos WHERE id_producto = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pedido;
    }

    public function insert($pedido) {
        try {
            $sql = "INSERT INTO pedidos (nombre_producto, descripcion_pedido, tipo_producto, cantidad, detalles_especiales, fecha_entrega)
                    VALUES (:nombre, :descripcion, :tipo, :cantidad, :detalles, :fecha)";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombre' => $pedido->getNombreProducto(),
                'descripcion' => $pedido->getDescripcionPedido(),
                'tipo' => $pedido->getTipoProducto(),
                'cantidad' => $pedido->getCantidad(),
                'detalles' => $pedido->getDetallesEspeciales(),
                'fecha' => $pedido->getFechaEntrega()
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

    public function update($pedido) {
        try {
            $sql = "UPDATE pedidos SET nombre_producto=:nombre, descripcion_pedido=:descripcion, tipo_producto=:tipo, cantidad=:cantidad, detalles_especiales=:detalles, fecha_entrega=:fecha WHERE id_producto=:id";
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombre' => $pedido->getNombreProducto(),
                'descripcion' => $pedido->getDescripcionPedido(),
                'tipo' => $pedido->getTipoProducto(),
                'cantidad' => $pedido->getCantidad(),
                'detalles' => $pedido->getDetallesEspeciales(),
                'fecha' => $pedido->getFechaEntrega(),
                'id' => $pedido->getIdProducto()
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

    public function delete($pedido) {
        try {
            $sql = "DELETE FROM pedidos WHERE id_producto=:id";
            $sentencia = $this->con->prepare($sql);
            $data = ['id' => $pedido->getIdProducto()];
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
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['IdU'])) {
    // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("Location: Index.php?c=index&f=index&p=Login");
    exit();
}

// Verificar el rol del usuario
$rolesPermitidos = array('Cliente');
if (!empty($_SESSION['Role']) && !in_array($_SESSION['Role'], $rolesPermitidos)) {
    // El usuario no tiene permisos para acceder a esta página
    header("Location: Index.php?c=index&f=index&p=Login");
    exit();
}
?>