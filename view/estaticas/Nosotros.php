<?php
    require_once 'config/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Calderon Serrano Kleidy Anallely">
    <title>Estampados y Sublimado - Nosotros</title>
    <link rel="stylesheet" href="assets/css/EstiloFooter.css">
    <style>
        /* Hoja de estilo interna */
        body {
             background-color: #fff;
             text-align: center;
        }
        /* Selectores simples */
        p {
             font-size: 17px;
        }
        /* Selectores de atributos */
        img[alt="Logo de Estampados y Sublimado"] {
             width: 100px;
             height: 100px;
             margin-right: 20px;
        }
        /* Selectores combinadores */
        .flex-container .flex-item {
             flex: 0 0 150px;
             margin: 20px;
        }
        /* Selectores de pseudo clases */
        .flex-container .flex-item:nth-child(2n) {
             background-color: #F0F8FF;
        }
        /* Selectores de pseudo elementos */
        .flex-container .flex-item::after {
             display: block;
             text-align: center;
             font-style: italic;
             color: #4682B4;
        }
        /* Estrategia de maquetación - Flexbox */
        .flex-container {
             display: flex;
             flex-wrap: wrap;
             justify-content: center;
             overflow-x: auto;
             margin-bottom: 20px;
        }
        /* Estilos para la sección de Nosotros */
        section {
             text-align: justify;
             text-align-last: center;
             margin: 20px auto;
             max-width: 800px;
        }
        section p {
             margin-bottom: 10px;
        }
        .nombres {
             text-align: center;
        }
    </style>
</head>
<body>
    <?php require_once HEADER; ?>
    <section>
        <!-- Contenido de la página de Nosotros -->
        <div>
             <h2>Sobre Nosotros</h2>
                 <p>En Sublimado y Estampado S.A., nos especializamos en la creación de productos personalizados utilizando las técnicas de sublimación y estampados. 
                    Sabemos que una venta exitosa comienza por captar la atención de tus clientes, y por eso te ofrecemos una amplia gama de opciones atractivas y de alta calidad</p>
                     <img src="assets/imagenes/subli.jpg" alt="Empresa" width="350" height="350">
                     <img src="assets/imagenes/subli1.png" alt="Empresa1" width="350" height="350">
                 <p>Con la sublimación, podemos llevar tus diseños y gráficos a otro nivel en productos como camisetas, creando impresiones vibrantes y duraderas. Nuestro proceso de sublimación 
                   asegura colores vivos y detalles nítidos que no se desvanecen con el tiempo. Ya sea que necesites camisetas promocionales, uniformes para tu equipo deportivo o prendas personalizadas 
                   para eventos, estamos aquí para ayudarte.</p>
        </div>
    </section>
    <section>
             <h3>Nuestro Equipo</h3>
                 <p>Nos enorgullece ser tu socio estratégico para realzar la imagen de tu marca a través de sublimación y estampados.</p>
        
        <div class="flex-container">
            <div class="flex-item">
                 <img src="assets/imagenes/kleidy.png" alt="Miembro del equipo 1" width="150" height="150">
                 <p class="nombres"><i>Kleidy Anallely Calderon Serrano</i></p>
            </div>
            <div class="flex-item">
                 <img src="assets/imagenes/gutierrez.png" alt="Miembro del equipo 2" width="150" height="150">
                 <p class="nombres"><i>Luis Eduardo Gutierrez Velez</i></p>
            </div>
            <div class="flex-item">
                 <img src="assets/imagenes/Meza.png" alt="Miembro del equipo 2" width="150" height="150">
                 <p class="nombres"><i>Maikel Danilo Meza Cedeño</i></p>
            </div>
            <div class="flex-item">
                 <img src="assets/imagenes/darwin.png" alt="Miembro del equipo 2" width="150" height="150">
                 <p class="nombres"><i>Darwin Alfredo Zambrano Muruzumbay</i></p>
            </div>
        </div>
    </section>
    <script>
     //Arreglo llamado equipo que contiene objetos, que representa a un miembro del equipo y tiene una propiedad descripcion.
        var equipo = [
            { 
                 descripcion: 'Encargada de realizar la página "Productos" del Sitio de Sublimado y Estampado S.A.'
            },
            {
                 descripcion: 'Encargado de realizar la página "Cliente" del Sitio de Sublimado y Estampado S.A.'
            },
            {
                  descripcion: 'Encargado de realizar la página "Categoría" del Sitio de Sublimado y Estampado S.A.'
            },
            {    
                 descripcion: 'Encargado de realizar la página "Pedidos" del Sitio de Sublimado y Estampado S.A.'
            }
        ];

            //Se obtienen todas las imágenes que se muestran en la presentacion del equipo
                var grupo = document.querySelectorAll('.flex-item img');
            // Agrega eventos al pasar el mouse sobre las imágenes del equipo
                grupo.forEach(function(imagen, index) {
    
                     imagen.addEventListener('mouseover', function() {
                         this.style.border = '1px solid blue'; //borde de grosor 1 píxel, de color azul sólido
                         this.style.transform = 'scale(1.1)'; //hace que la imagen se vea un poco más grande
                    });
                     imagen.addEventListener('mouseout', function() {
                         this.style.border = 'none'; //devuelve la imagen a su estado original(sin borde)
                         this.style.transform = 'scale(1)'; //regresa la imagen a su tamaño original
                    });
               //Agrega un evento de click a cada imagen del equipo 
               
                     imagen.addEventListener('click', function() {
                         var descripcion = equipo[index].descripcion; //obtiene la descripción correspondiente 
                         alert('\nDescripción: ' + descripcion); //muestra una alerta con la descripción
                    });
                });

               //Se obtienen todos los elementos
                var Items = document.querySelectorAll('.grid-item');
                //// Agrega eventos al pasar el mouse 
                Items.forEach(function(item) {

                     item.addEventListener('mouseover', function() {
                         this.style.backgroundColor = '#bfbfbf'; //cambia el color de fondo
                    });

                     item.addEventListener('mouseout', function() {
                         this.style.backgroundColor = '#AFEEEE'; //vuelve al color original
                    });
                });
    </script>
     <?php require_once FOOTER; ?>
</body>
</html> 