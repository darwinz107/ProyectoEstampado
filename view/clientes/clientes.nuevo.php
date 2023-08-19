<!--autor: Gutierrez Velez Luis-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">

<div class="contenedorF">
    <div class="formulario-card card">
        <h2 class="titulo-form"><?php echo $titulo; ?></h2>
        <form action="index.php?c=clientes&f=new" method="POST" name="formClienNuevo" id="formClienNuevo">
            <div class="formulario">

                <div class="form-group">
                    <label class="principal" for="nombre">Nombres:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre cliente" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="apellido">Apellidos:</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="apellido cliente" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="telefono">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono cliente" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="email">Correo Electronico:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email cliente" required>
                </div>

                <div class="form-group">
                    <label class="principal">Genero:</label>
                    <div class="rating">
                        <label>
                            <input type="radio" id="masculino" name="genero" value="masculino">
                            Masculino
                        </label>
                
                        <label>
                            <input type="radio" id="femenino" name="genero" value="femenino">
                            Femenino
                        </label>
                    </div>
                </div>

                <div class="botones">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=clientes&f=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
