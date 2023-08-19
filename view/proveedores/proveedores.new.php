<!--autor:Meza Cedeño Maikel Danilo-->
<?php require_once HEADER; ?>
<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">

<div class="contenedorF">
    <div class="formulario-card card">
        <h2 class="titulo-form"><?php echo $titulo; ?></h2>
        <form action="index.php?c=Proveedores&f=new" method="POST" name="formProvNuevo" id="formProvNuevo">
            <div class="formulario">
                <div class="form-group">
                    <label for="nombre">Proveedor</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre del proveedor" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="número del telefono" required>
                </div>

                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion del Proveedor" required>
                </div>
                
                <div class="form-group">
                    <label class="principal">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" placeholder="Precio del producto del Material" required>
                </div>

                <div class="form-group">
                    <label class="principal">Plazo de Entrega</label>

                    <div class="radio-buttons">
                      <input type="radio" id="plazo1" name="plazo_entrega" value="1 - 15 Dias">
                      <label for="plazo1">1 - 15 Dias</label>

                      <input type="radio" id="plazo2" name="plazo_entrega" value="15 - 30 Dias">
                      <label for="plazo2">15 - 30 Dias</label>

                      <input type="radio" id="plazo3" name="plazo_entrega" value="1 - 3 Meses">
                      <label for="plazo3">1 - 3 Meses</label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="principal">Metodo de Pago</label>
                    <select name="mpago" id="mpago" class="form-control">
                        <option value="Paypal">Paypal</option>
                        <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                        <option value="Tarjeta de Debito">Tarjeta de Debito</option>
                    </select>
                </div>


               <div class="form-group">
                    <label class="principal" for="material">Materiales</label>
                    <input type="text" name="material" id="material">
                </div>     

                <div class="botones">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=proveedores&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
