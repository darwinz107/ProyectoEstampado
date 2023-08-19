<!--autor: Calderon Serrano Kleidy-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">

<div class="contenedorF">
    <div class="formulario-card card">
        <h2 class="titulo-form"><?php echo $titulo; ?></h2>
        <form action="index.php?c=productos&f=edit" method="POST" name="formProdNuevo" id="formProdNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $prod['id_producto']; ?>" />
            <div class="formulario">
                <div class="form-group">
                    <label class="principal" for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prod['nombre']; ?>" placeholder="Nombre del producto" required>
                </div>
                <div class="form-group">
                     <label class="principal">Descripción del producto:</label>
                     <input type="text" name="descripcion" id="descripcion" value="<?php echo $prod['descripcion']; ?>" placeholder="Descripcion del producto" required>
                </div>
                <div class="form-group">
                    <label class="principal" for="categoria">Categoría</label>
                    <select id="categoria" name="categoria">
                        <?php foreach ($categorias as $cat) { ?>
                            <option value="<?php echo $cat->cat_id; ?>" <?php echo ($cat->cat_id == $prod['id_categoria']) ? 'selected' : ''; ?>><?php echo $cat->cat_nombre; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="principal" for="precio">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $prod['precio']; ?>" placeholder="Precio del producto" required>
                </div>
                <div class="form-group">
                     <label class="principal">Tipo de Material</label>
                   <div class="radio-buttons">
                      <input type="radio" id="material1" name="tipo_material" value="Sublimado" <?php echo ($prod['tipo_material'] == 'Sublimado') ? 'checked' : ''; ?>>
                      <label for="material1">Sublimado</label>

                      <input type="radio" id="material2" name="tipo_material" value="Estampado" <?php echo ($prod['tipo_material'] == 'Estampado') ? 'checked' : ''; ?>>
                      <label for="material2">Estampado</label>
                   </div>
               </div>
                <div class="form-group">
                    <label class="principal">Disponibilidad</label>
                    <input type="checkbox" id="disponibilidad" value="1" name="disponibilidad" <?php echo ($prod['disponibilidad'] == 1) ? 'checked="checked"' : ''; ?>>
                </div>
                <div class="form-group">
                    <label class="principal" for="caracteristica_destacada">Característica Destacada</label>
                    <input type="text" name="caracteristica_destacada" id="caracteristica_destacada" value="<?php echo $prod['caracteristica_destacada']; ?>" placeholder="Característica destacada del producto" required>
                </div>
                <div class="botones">
                    <button type="submit" onclick="return confirm('¿Estás seguro de modificar el producto?')">Guardar</button>
                    <a href="index.php?c=productos&f=index">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>
