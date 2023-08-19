<?php
      if(!isset($_SESSION)) {session_start();} 

      $user_name = "";
      $user_role = "";

    if (isset($_SESSION['IdU'])) {
         $user_name = $_SESSION['Name'];
         $user_role = $_SESSION['Role'];
    }
?>
<!DOCTYPE html>
<html lang="es">
     <head>
         <meta charset="UTF-8">
         <title>Inicio</title>
         <link rel="stylesheet" href="assets/css/EstiloHeader.css">
   </head>
   <body>
        <div class="encabezado">
            <div class="logo">
                 <img src="assets/imagenes/logotipo.png" alt="Logo de Estampados y Sublimado">
                 <h1 class="sitio">Sublimado y Estampados S.A.</h1>
           </div>
           <?php if (isset($_SESSION['IdU'])): ?>
            <div class="bienvenida">
                 <h3>Bienvenido, <?php echo $user_name; ?> (<?php echo $user_role; ?>)</h3>
            </div>
            <nav>
                <ul class="nav-list">
                    <li><a href="Index.php">Inicio</a></li>
                    
                    <?php if ($user_role === 'Administrador') { // administrador
                       ?>
                       <li><a href="index.php?c=productos&f=index">Productos</a></li>
                       <li><a href="index.php?c=categorias&f=index">Categoria</a></li>
                       <li><a href="index.php?c=proveedores&f=index">Proveedores</a></li>
                       <li><a href="Validar.php?op=cerrar">Cerrar Sesión</a></li>
                    <?php } else if ($user_role === 'Gerente') {// gerente
                        ?>    
                        <li><a href="index.php?c=productos&f=index">Productos</a></li>
                        <li><a href="index.php?c=categorias&f=index">Categoria</a></li>
                        <li><a href="Validar.php?op=cerrar">Cerrar Sesión</a></li>
                   <?php } else if ($user_role === 'Cliente') {// cliente
                        ?>
                        
                        <li><a href="index.php?c=clientes&f=index">Clientes</a></li>
                        <li><a href="index.php?c=pedidos&f=index">Pedidos</a></li>
                        <li><a href="Validar.php?op=cerrar">Cerrar Sesión</a></li>
                   <?php
                    }
                    ?>
                </ul>
            </nav>

            <?php else: ?>
                <nav>
                    <ul class="nav-list">
                      <li><a href="Index.php">Inicio</a></li>
                      <li><a href="#" onclick="showAlert()">Cliente</a></li>
                      <li><a href="#" onclick="showAlert()">Productos</a></li>
                      <li><a href="#" onclick="showAlert()">Categoría</a></li>
                      <li><a href="#" onclick="showAlert()">Pedidos</a></li>
                      <li><a href="#" onclick="showAlert()">Proveedores</a></li>
                      <li><a href="Index.php?c=index&f=index&p=Login">Iniciar Sesión</a></li>
                      
                   </ul>
                </nav>
           <?php endif; ?>
       </div>
       <script>
            function showAlert() {
                 alert("Debe iniciar sesión para acceder a esta página.");
            }
       </script>
   </body>
</html>

