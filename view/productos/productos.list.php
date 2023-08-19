<!--autor: Calderon Serrano Kleidy-->
<?php require_once HEADER; ?>

    <link rel="stylesheet" href="assets/css/EstiloHeader.css">
    <link rel="stylesheet" href="assets/css/EstiloFooter.css">
 
    <style>
    /* Estilos para la tabla */
    body {
        margin: 0;
        padding: 0;
    }

    .contenedorT {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #b2b2b2;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #b2b2b2;
        padding: 8px;
        text-align: center;
        font-size: 14px;
    }

    th {
        background-color: #5DADE2;
        color: white;
    }

    td a {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: #5DADE2;
        color: white;
        text-decoration: none;
        font-size: 12px;
    }

    td a:hover {
        background-color: #82C4E9;
        cursor: pointer;
    }

    .btn-nuevo {
        display: block;
        margin: 20px auto; 
        padding: 10px 10px;
        border-radius: 5px;
        background-color: #27AE60;
        color: white;
        text-decoration: none;
        font-size: 14px;
        text-align: center; 
        max-width: 100px;
    }

    .btn-nuevo:hover {
        background-color: #2ECC71;
        cursor: pointer;
    }  

    .contenedorT h2 {
        text-align: center;
        background-color: #4682B4; 
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .btn-editar {
        background-color: #E74C3C; 
    }

    .btn-editar:hover {
        background-color: #C0392B;
    }

    .btn-eliminar {
        background-color: #FF5733; 
    }

    .btn-eliminar:hover {
        background-color: #D35400; 
    }
    
</style>

<div class="contenedorT">
    <h2><?php echo $titulo; ?></h2>
    <form action="index.php?c=productos&f=search" method="POST" style="background-color: #F2F2F2; padding: 10px; border-radius: 5px;">
        <label for="b" style="color: #5DADE2; font-weight: bold;"></label>
        <input type="text" name="b" id="b" style="padding: 5px;">
        <input type="submit" value="Buscar" style="padding: 5px; background-color: #5DADE2; color: white; border: none; border-radius: 5px; cursor: pointer;">
    </form>
    <table class="tabla">
        <thead>
            <tr>
             <th>Nombre</th>
             <th>Descripción</th>
             <th>Categoría</th>
             <th>Precio</th>
             <th>Tipo de Material</th>
             <th>Disponibilidad</th>
             <th>Característica Destacada</th>
             <th>Acciones</th>
           </tr>
       </thead>
       <tbody>
            <?php foreach ($resultados as $fila) { ?>
            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td> 
                <td><?php echo $fila['cat_nombre']; ?></td>
                <td><?php echo $fila['precio']; ?></td>
                <td><?php echo $fila['tipo_material']; ?></td>
                <td><?php echo ($fila['disponibilidad'] == 1) ? 'Disponible' : 'No disponible'; ?></td>
                <td><?php echo $fila['caracteristica_destacada']; ?></td>
                <td>
                    <a href="index.php?c=productos&f=view_edit&id=<?php echo $fila['id_producto']; ?>" class="btn btn-editar">Editar</a>
                    <a onclick="if(!confirm('¿Está seguro de eliminar el producto?')) return false;" href="index.php?c=productos&f=delete&id=<?php echo $fila['id_producto']; ?>" class="btn btn-eliminar">Eliminar</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
   </table>
       <a href="index.php?c=productos&f=view_new" class="btn-nuevo">Nuevo Producto</a>
</div>

<?php require_once FOOTER; ?>
