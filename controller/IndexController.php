<?php
class IndexController {
    
    public function index() {
        if (!empty($_GET['p'])) {
            $page =  $_GET['p']; // limpiar datos

            require_once HEADER;
            require_once 'view/estaticas/'.$page.'.php';
            require_once FOOTER;
        } else {
            require_once 'view/HomeView.php'; //mostrando la vista de home de la aplicacion
        }
    }
}
?>


