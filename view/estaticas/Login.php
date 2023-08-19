<?php
    if (isset($_SESSION['IdU'])) {
        header("Location: Index.php"); // Redirigir si ya ha iniciado sesión
        exit();
    }
    require_once 'config/ConexionBD.php';
    require_once 'config/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
         <title>Login</title>
         <link rel="stylesheet" href="assets/css/EstiloHeader.css">
         <link rel="stylesheet" href="assets/css/EstiloFooter.css">
        <style>
            body {
             margin: 0;
             padding: 0;
            }
            .contenedor {
             display: flex;
             justify-content: center;
             align-items: center;
             height: calc(100vh - 40px); 
            }
            .form1 {
             width: 300px;
             background-color: #f2f2f2;
             border: 1px solid #ddd;
             padding: 20px;
             border-radius: 5px;
             text-align: center;
            }
            .form2 {
              margin-bottom: 15px;
            }
            label {
             display: block;
             font-weight: bold;
             margin-bottom: 5px;
             text-align: left;
            }
            input[type="text"],
            input[type="password"] {
             width: 100%;
             padding: 5px;
             border: 1px solid #ddd;
             border-radius: 3px;
            }
            input[type="submit"] {
             background-color: #3498DB;
             color: #fff;
             border: none;
             padding: 10px 15px;
             cursor: pointer;
             width: 100%;
            }
            input[type="submit"]:hover {
             background-color: #2374AB;
            }
            .error {
             color: red;
             margin-bottom: 15px;
            }
       </style>
   </head>

   <body>
         <?php require_once HEADER; ?>
        <div class="contenedor">
            <div class="form1">
                 <h2>Iniciar Sesión</h2>
                <form method="POST" action="Validar.php">
                    <div class="form2">
                       <label for="usuario">Usuario:</label>
                       <input type="text" name="usuario" required>
                   </div>
                   <div class="form2">
                       <label for="contrasena">Contraseña:</label>
                       <input type="password" name="contrasena" required>
                   </div>
                   <input type="submit" value="Iniciar Sesión">
               </form>
               <?php
                     if(!isset($_SESSION)) {session_start();}
                     // leer datos de session
                     $mensaje = (isset($_SESSION['mensaje']))?htmlentities($_SESSION['mensaje']):'';
                     echo '<div class="error">' . $mensaje . '</div>';
    
                     // eliminar una variable 
                      unset($_SESSION['mensaje']);  
                ?>
           </div>
        </div>
        <?php require_once FOOTER; ?>
   </body>
</html>

