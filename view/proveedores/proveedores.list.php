<!--autor:Meza Cedeño Maikel Danilo-->
<?php require_once HEADER; ?>
<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstiloTable.css">

<div class="contenedorT">
    <h2><?php echo $titulo; ?></h2>
    <form action="index.php?c=Proveedores&f=search" method="POST" style="background-color: #F2F2F2; padding: 10px; border-radius: 5px;">
        <label for="b" style="color: #5DADE2; font-weight: bold;"></label>
        <input type="text" name="b" id="b" style="padding: 5px;">
        <input type="submit" value="Buscar" style="padding: 5px; background-color: #5DADE2; color: white; border: none; border-radius: 5px; cursor: pointer;">
    </form>
    
    <div class="tabla">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Proveedor </th>
                    <th>telefono </th>
                    <th>direccion </th>
                    <th>PrecioxDocena </th>
                    <th>Plazo de Entrega </th>
                    <th>Materiales</th>
                    <th>Metodo de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tabladatos">
                <?php foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['prov_nombre']; ?></td>
                        <td><?php echo $fila['prov_telefono']; ?></td>
                        <td><?php echo $fila['prov_direccion']; ?></td>
                        <td><?php echo $fila['prov_precio']; ?></td>
                        <td><?php echo $fila['prov_plazo_entrega']; ?></td>
                        <td><?php echo $fila['prov_material']; ?></td>
                        <td><?php echo $fila['prov_mpago']; ?></td>
                       
                        <td>
                            <a href="index.php?c=Proveedores&f=view_edit&id=<?php echo $fila['prov_id']; ?>" class="btn btn-editar">Editar</a>
                            <a onclick="if(!confirm('¿Está seguro de eliminar el Proveedor?')) return false;" href="index.php?c=proveedores&f=delete&id=<?php echo $fila['prov_id']; ?>" class="btn btn-eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php  }?>
            </tbody>
        </table>
        <a href="index.php?c=proveedores&f=view_new" class="btn-nuevo">Nuevo Proveedor</a>
    </div>

</div>
<?php  require_once FOOTER ?>