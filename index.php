<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);

if ($uri[1] === 'dueños') {
    require_once 'Controlador/dueñosController.php';
} elseif ($uri[1] === 'mascotas') {
    require_once 'Controlador/mascotasController.php';
} elseif ($uri[1] === 'citas') {
    require_once 'Controlador/citasController.php';
} else {
    echo "Ruta no válida.";
}
?>
