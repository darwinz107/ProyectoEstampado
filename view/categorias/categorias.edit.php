<!--autor:Meza Cedeño Maikel Danilo-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">

<div class="contenedorF">
    <div class="formulario-card card">
        <h2 class="titulo-form"><?php echo $titulo; ?></h2>
        <form action="index.php?c=categorias&f=edit" method="POST" name="formCatNueva" id="formCatNueva">  
        <input type="hidden" name="id" id="id" value="<?php echo $cat['cat_id']; ?>"/>
            <div class="formulario">
            <div class="form-group">
                    <label class="principal" for="nombre">Categoría</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $cat['cat_nombre']; ?>" class="form-control" placeholder="nombre categoria" required>
                </div>

                <div class="form-group">
                    <label class="principal" for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo $cat['cat_descripcion']; ?>" class="form-control" placeholder="descripcion del producto" required>
                </div>     

                <label class="principal" for="estado">Disponibilidad</label>
                <div class="form-group">
                    <input type="checkbox" id="estado" value="<?php echo $cat['cat_estado']?>" 
                        name="estado"  <?php echo ($cat['cat_estado'] == 1)?'checked="checked"':''; ?> > 
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