<?php
session_start();

require_once 'config/config.php';
require_once 'config/ConexionBD.php';

// Verificar si se ha enviado una solicitud para cerrar la sesión
if (isset($_GET['op']) && $_GET['op'] === 'cerrar') {
    // Eliminar todas las variables almacenadas en sesión
    session_unset();
    // Eliminar/ destruir la sesión
    session_destroy();
    // Redirigir al formulario de inicio de sesión
    header("Location: Index.php");
    exit();
}

// Verificar si el usuario ya ha iniciado sesión, redirigirlo a la página principal
if (isset($_SESSION['IdU'])) {
    header("Location: Index.php");
    exit();
}

// Verificar si el formulario de inicio de sesión fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario']) && isset($_POST['contrasena'])) {

    // Obtener los datos ingresados por el usuario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Conexión a la base de datos
    require_once "config/ConexionBD.php";
    $con = Conexion::getConexion();

    // Consulta SQL preparada para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios1 WHERE Usuario = :usuario AND Contraseña = :contrasena";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->execute();

    // Verificar si se encontró un usuario con esas credenciales
    if ($stmt->rowCount() === 1) {
        // Obtener los datos del usuario
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $IdU = $row['IdUser'];
        $Name = $row['Usuario'];
        $Role = $row['Rol'];

        // Verificar si el usuario tiene el rol adecuado para acceder a la página principal
        // Consulta SQL para obtener los roles permitidos para la página principal
        $sqlRolesPermitidos = "SELECT * FROM usuarios1 WHERE Rol = :role";
        $stmtRolesPermitidos = $con->prepare($sqlRolesPermitidos);
        $stmtRolesPermitidos->bindParam(':role', $Role);
        $stmtRolesPermitidos->execute();

        // Crear un array con los roles permitidos para la página principal
        $rolesPermitidos = array();
        while ($filaRol = $stmtRolesPermitidos->fetch(PDO::FETCH_ASSOC)) {
            $rolesPermitidos[] = $filaRol['Rol'];
        }

        if (in_array($Role, $rolesPermitidos)) {
            // Guardar los datos del usuario en variables de sesión
            $_SESSION['IdU'] = $IdU;
            $_SESSION['Name'] = $Name;
            $_SESSION['Role'] = $Role;

            // Redirigir al usuario a la página principal del sistema
            header("Location: Index.php");
            exit();

        } else {
            $_SESSION['mensaje'] = "Usuario no autorizado para acceder a la página principal.";
            // Redireccionamiento a pagina de login
            header("Location: Index.php?c=index&f=index&p=Login");
            die();
        }

    } else {
        $_SESSION['mensaje'] = "Usuario y/o contraseña incorrectos";
        // redireccionamiento a pagina de login
        header("Location: Index.php?c=index&f=index&p=Login");
        die();
    }
    // Cerrar la conexión a la base de datos
    $con = null;
}
?>
