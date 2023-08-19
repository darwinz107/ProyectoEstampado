<!--autor: Gutierrez Velez Luis-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">

<div class="contenedorF">
    <div class="formulario-card card">
    <h2 class="titulo-form"><?php echo $titulo; ?></h2>
        <form action="index.php?c=clientes&f=edit" method="POST" name="formClienNuevo" id="formClienNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $prod['idCliente']; ?>"/>
            <div class="formulario">
                
                <div class="form-group">
                    <label class="principal" for="nombre">Nombres:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prod['Nombres']; ?>" class="form-control" placeholder="nombres cliente" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="apellido">Apellidos:</label>
                    <input type="text" name="apellido" id="apellido" value="<?php echo $prod['Apellidos']; ?>" class="form-control" placeholder="apellidos cliente" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="telefono">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $prod['Telefono']; ?>" class="form-control" placeholder="telefono cliente" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="email">Correo Electronico:</label>
                    <input type="email" name="email" id="email" value="<?php echo $prod['Email']; ?>" class="form-control" placeholder="Correo cliente" required>
                </div>    
                
                <div class="form-group">
                    <label class="principal">Genero:</label>
                    <div class="rating">
                        <label>
                            <input type="radio" name="genero" value="masculino" <?php if ($prod['Genero'] === 'masculino') echo 'checked'; ?>>
                            Masculino
                        </label>
                
                        <label>
                            <input type="radio" name="Genero" value="femenino" <?php if ($prod['Genero'] === 'femenino') echo 'checked'; ?>>
                            Femenino
                        </label>
                    </div>
                </div>

                <div class="botones">
                    <button type="submit" class="btn btn-primary"
                     onclick="if (!confirm('Esta seguro de modificar los datos del cliente?')) return false;" >Guardar</button>
                    <a href="index.php?c=clientes&f=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
