<?php
    require_once 'autoload.php';
    session_start();

    $gestor = new GestorEstelar();
    $controller = new ExpedicionController($gestor);

    $accion = $_GET['accion'] ?? 'index';

    switch ($accion) {
        case 'crear':
            $controller->crear();
            break;
        case 'editar':
            $controller->editar();
            break;
        case 'eliminar':
            $controller->eliminar();
            break;    
        case 'mostrarFormEditar':
             $controller->mostrarFormEditar();
             break;    
        default:
        $controller->index();
    }



?>