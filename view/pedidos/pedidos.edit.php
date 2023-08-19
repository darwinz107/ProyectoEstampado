
<!--autor: Darwin Zambrano-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">

<div class="contenedorF">
    <div class="formulario-card card">
        <h2 class="titulo-form">Editar Producto</h2>
        <form action="index.php?c=pedidos&f=editar" method="POST" name="formPedidoEditar" id="formPedidoEditar">
            <input type="hidden" name="id" id="id" value="<?php echo $pedido['id_pedido']; ?>" />
            <div class="formulario">
                <div class="form-group">
                    <label class="principal" for="nombre_producto">Nombre del Producto</label>
                    <input type="text" name="nombre_producto" id="nombre_producto" value="<?php echo $pedido['nombre_producto']; ?>" placeholder="Nombre del producto" required>
                </div>
                <div class="form-group">
                     <label class="principal">Descripción del Pedido</label>
                     <input type="text" name="descripcion_pedido" id="descripcion_pedido" value="<?php echo $pedido['descripcion_pedido']; ?>" placeholder="Descripcion del pedido" required>
                </div>
                <div class="form-group">
                    <label class="principal" for="tipo_producto">Tipo de Producto</label>
                    <select id="tipo_producto" name="tipo_producto">
                        <option value="Camiseta" <?php echo ($pedido['tipo_producto'] == 'Camiseta') ? 'selected' : ''; ?>>Camiseta</option>
                        <option value="Vaso" <?php echo ($pedido['tipo_producto'] == 'Vaso') ? 'selected' : ''; ?>>Vaso</option>
                        <option value="Gorra" <?php echo ($pedido['tipo_producto'] == 'Gorra') ? 'selected' : ''; ?>>Gorra</option>
                        <option value="Otro" <?php echo ($pedido['tipo_producto'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="principal" for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" value="<?php echo $pedido['cantidad']; ?>" placeholder="Cantidad del pedido" required>
                </div>
                <div class="form-group">
                     <label class="principal">Detalles Especiales</label>
                     <textarea name="detalles_especiales" id="detalles_especiales" placeholder="Detalles especiales del pedido"><?php echo $pedido['detalles_especiales']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="principal" for="fecha_entrega">Fecha de Entrega</label>
                    <input type="date" name="fecha_entrega" id="fecha_entrega" value="<?php echo $pedido['fecha_entrega']; ?>" required>
                </div>
                <div class="botones">
                    <button type="submit" onclick="return confirm('¿Estás seguro de modificar el pedido?')">Guardar</button>
                    <a href="index.php?c=pedidos&f=index">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>