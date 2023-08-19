<!--autor: Gutierrez Velez Luis-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstiloTable.css">

<div class="contenedorT">
<h2> <?php echo $titulo?></h2>
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=clientes&f=search" method="POST" style="background-color: #F2F2F2; padding: 10px; border-radius: 5px;">
                <label for="b" style="color: #5DADE2; font-weight: bold;"></label>
                <input type="text" name="b" id="busqueda"  placeholder="buscar..." style="padding: 5px;"/>
                <input type="submit" value="Buscar" style="padding: 5px; background-color: #5DADE2; color: white; border: none; border-radius: 5px; cursor: pointer;">
            </form>       
        </div>
    </div>
    <div class="tabla">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <th>Nombres </th>
            <th>Apellidos </th>
            <th>Genero </th>
            <th>Telefono </th>
            <th>Correo Electronico </th>
            <th>Acciones </th>
            </thead>
            <tbody class="tabladatos">
                <?php         
                foreach ($resultados as $fila) {
                  ?>
                <tr>
                    <td><?php echo $fila['Nombres'];?></td>
                    <td><?php echo $fila['Apellidos'];?></td>
                    <td><?php echo $fila['Genero'];?></td>
                    <td><?php echo $fila['Telefono'];?></td>
                    <td><?php echo $fila['Email'];?></td>
                    <td>
                    <a class="btn btn-editar" href="index.php?c=clientes&f=view_edit&id=<?php echo  $fila['idCliente']; ?>">Editar</a>
                    <a class="btn btn-eliminar" onclick="if(!confirm('Esta seguro de eliminar al Cliente?'))return false;" 
                    href="index.php?c=clientes&f=delete&id=<?php echo  $fila['idCliente']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php  }?>
            </tbody>
        </table>
        <a href="index.php?c=clientes&f=view_new" class="btn-nuevo">Nuevo Cliente</a>
    </div>

</div>
<?php  require_once FOOTER ?>