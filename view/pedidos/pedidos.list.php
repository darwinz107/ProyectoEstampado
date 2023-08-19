<!--autor: Darwin Zambrano-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
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
        padding: 10px;
        text-align: center;
        font-size: 14px;
    }

    th {
        background-color: #5DADE2;
        color: white;
    }

    .btn {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 12px;
        cursor: pointer;
    }

    .btn-editar {
        background-color: #E74C3C;
        color: white;
    }

    .btn-editar:hover {
        background-color: #C0392B;
    }

    .btn-eliminar {
        background-color: #FF5733;
        color: white;
    }

    .btn-eliminar:hover {
        background-color: #D35400;
    }

    .btn-nuevo {
        display: block;
        margin: 20px auto;
        padding: 10px;
        border-radius: 5px;
        background-color: #27AE60;
        color: white;
        text-decoration: none;
        font-size: 14px;
        text-align: center;
        max-width: 120px;
    }

    .btn-nuevo:hover {
        background-color: #2ECC71;
    }

    .contenedorT h2 {
        text-align: center;
        background-color: #4682B4;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    form {
        background-color: #F2F2F2;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    input[type="text"] {
        padding: 5px;
    }

    input[type="submit"] {
        padding: 5px;
        background-color: #5DADE2;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #82C4E9;
    }
</style>

<div class="contenedorT">
    <h2><?php echo $titulo; ?></h2>
    <form action="index.php?c=pedidos&f=search" method="POST" style="background-color: #F2F2F2; padding: 10px; border-radius: 5px;">
        <label for="b" style="color: #5DADE2; font-weight: bold;"></label>
        <input type="text" name="b" id="b" style="padding: 5px;">
        <input type="submit" value="Buscar" style="padding: 5px; background-color: #5DADE2; color: white; border: none; border-radius: 5px; cursor: pointer;">
    </form>
    <table class="tabla">
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Descripción del Pedido</th>
                <th>Tipo de Producto</th>
                <th>Cantidad</th>
                <th>Detalles Especiales</th>
                <th>Fecha de Entrega</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $fila) { ?>
                <tr>
                    <td><?php echo $fila['nombre_producto']; ?></td>
                    <td><?php echo $fila['descripcion_pedido']; ?></td>
                    <td><?php echo $fila['tipo_producto']; ?></td>
                    <td><?php echo $fila['cantidad']; ?></td>
                    <td><?php echo $fila['detalles_especiales']; ?></td>
                    <td><?php echo $fila['fecha_entrega']; ?></td>
                    <td>
                        <a href="index.php?c=pedidos&f=view_edit&id=<?php echo $fila['id_producto']; ?>" class="btn btn-editar">Editar</a>
                        <a onclick="if(!confirm('¿Está seguro de eliminar el producto?')) return false;" href="index.php?c=pedidos&f=delete&id=<?php echo $fila['id_producto']; ?>" class="btn btn-eliminar">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php?c=pedidos&f=view_new" class="btn-nuevo">Nuevo Producto</a>
</div>

<?php require_once FOOTER; ?>