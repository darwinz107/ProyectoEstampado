<!--autor: Darwin Zambrano-->
<?php require_once HEADER; ?>

<link rel="stylesheet" href="assets/css/EstiloHeader.css">
<link rel="stylesheet" href="assets/css/EstiloFooter.css">
<link rel="stylesheet" href="assets/css/EstilosForm.css">
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .contenedorF {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .card {
        background-color: #F2F2F2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .titulo-form {
        text-align: center;
        margin-bottom: 20px;
    }

    .formulario {
        width: 100%;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .principal {
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea,
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #b2b2b2;
        border-radius: 5px;
    }

    select {
        height: 38px;
    }

    textarea {
        height: 100px;
    }

    .botones {
        text-align: center;
        margin-top: 20px;
    }

    button {
        background-color: #27AE60;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    button:hover {
        background-color: #2ECC71;
    }

    a {
        background-color: #5DADE2;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    a:hover {
        background-color: #82C4E9;
    }
</style>
<div class="contenedorF">
    <div class="formulario-card card">
        <h2 class="titulo-form">Realiza tu Pedido de Estampados Personalizados</h2>
        <form action="index.php?c=pedidos&f=crear" method="POST" class="formulario">
            
            <div class="form-group">
                <label class="principal">Nombre del Producto</label>
                <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Nombre del producto" required>
            </div>
            <div class="form-group">
                <label class="principal">Descripción del Pedido</label>
                <input type="text" name="descripcion_pedido" id="descripcion_pedido" placeholder="Descripción del pedido" required>
            </div>
            <div class="form-group">
                <label class="principal">Tipo de Producto</label>
                <select id="tipo_producto" name="tipo_producto">
                    <option value="Camiseta">Camiseta</option>
                    <option value="Vaso">Vaso</option>
                    <option value="Gorra">Gorra</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label class="principal">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad del pedido" required>
            </div>
            <div class="form-group">
                <label class="principal">Detalles Especiales</label>
                <textarea name="detalles_especiales" id="detalles_especiales" placeholder="Detalles especiales del pedido"></textarea>
            </div>
            <div class="form-group">
                <label class="principal">Fecha de Entrega</label>
                <input type="date" name="fecha_entrega" id="fecha_entrega" required>
            </div>
            <div class="botones">
                <button type="submit">Realizar Pedido</button>
                <a href="index.php?c=pedidos&f=index">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>