<?php

include_once '../librerias/conexion.php';
include_once 'controller/controllerClass.php';
include_once 'view/viewClass.php';
include_once 'model/modelClass.php';

$controller = new controllerClass();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->delete();
            break;
        case 'read':
            $controller->index();
            break;
        default:
            $controller->notFound();
    }
} else {
    $controller->index();
}
?>