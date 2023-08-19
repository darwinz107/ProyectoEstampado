<!--autor:Meza Cedeño Maikel Danilo-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">

<div class="contenedorF">
    <div class="formulario-card card">
        <h2 class="titulo-form"><?php echo $titulo; ?></h2>
        <form action="index.php?c=proveedores&f=edit" method="POST" name="formProvNuevo" id="formProvNuevo">  
            <input type="hidden" name="id" id="id" value="<?php echo $prov['prov_id']; ?>"/>
            <div class="formulario">

                <div class="form-group">
                    <label class="principal" for="nombre">Proveedor</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prov['prov_nombre']; ?>" class="form-control" placeholder="nombre proveedor" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $prov['prov_telefono']; ?>" class="form-control" placeholder="Telefono del proveedor" required>
                </div>   
                 
                <div class="form-group">
                    <label class="principal" for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $prov['prov_direccion']; ?>" class="form-control" placeholder="Direccion del proveedor" required>
                </div>     

                <div class="form-group">
                    <label class="principal" for="precio">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $prov['prov_precio']; ?>" placeholder="Precio del producto que Provee" required>
                </div>
                
                <div class="form-group">
                    <label class="principal">Plazo de Entrega</label>

                    <div class="radio-buttons">
                      <input type="radio" id="plazo1" name="plazo_entrega" value="1 - 15 Dias" <?php echo ($prov['prov_plazo_entrega'] == '1 - 15 Dias') ? 'checked' : ''; ?>>
                      <label for="plazo1">1 - 15 Dias</label>

                      <input type="radio" id="plazo2" name="plazo_entrega" value="15 - 30 Dias" <?php echo ($prov['prov_plazo_entrega'] == '15 - 30 Dias') ? 'checked' : ''; ?>>
                      <label for="plazo2">15 - 30 Dias</label>

                      <input type="radio" id="plazo3" name="plazo_entrega" value="1 - 3 Meses" <?php echo ($prov['prov_plazo_entrega'] == '1 - 3 Meses') ? 'checked' : ''; ?>>
                      <label for="plazo3">1 - 3 Meses</label>
                   </div>
               </div>

               <div class="form-group">
                    <label class="principal">Metodo de Pago</label>
                    <select name="mpago" id="mpago" class="form-control">
                        <option value="Paypal" <?php echo ($prov['prov_mpago'] == 'Paypal') ? 'selected' : ''; ?>>Paypal</option>
                        <option value="Tarjeta de Credito" <?php echo ($prov['prov_mpago'] == 'Tarjeta de Credito') ? 'selected' : ''; ?>>Tarjeta de Credito</option>
                        <option value="Tarjeta de Debito" <?php echo ($prov['prov_mpago'] == 'Tarjeta de Debito') ? 'selected' : ''; ?>>Tarjeta de Debito</option>
                    </select>
                </div>


               <div class="form-group">
                    <label class="principal" for="material">Materiales</label>
                    <input type="text" name="material" id="material" value="<?php echo $prov['prov_material']; ?>" class="form-control" placeholder="Materiales que Provee" required>
                </div>     
                

                <div class="botones">
                    <button type="submit" class="btn btn-primary"
                    onclick="if (!confirm('Esta seguro de modificar la categoria?')) return false;" >Guardar</button>
                    <a href="index.php?c=categorias&f=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>