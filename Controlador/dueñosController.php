<?php
require_once '../header.php';
require_once '../Modelos/Dueños.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$dueños = new Dueños();

$accion = $_GET['accion'] ?? null;

if ($accion === 'listar') {
    echo json_encode($dueños->listar());
} elseif ($accion === 'insertar') {
    $data = json_decode(file_get_contents("php://input"), true);
    $dueños->insertar($data['nombre'], $data['telefono'], $data['direccion']);
    echo json_encode(["mensaje" => "Dueño insertado con éxito."]);
} elseif ($accion === 'actualizar') {
    $data = json_decode(file_get_contents("php://input"), true);
    $dueños->actualizar($data['id'], $data['nombre'], $data['telefono'], $data['direccion']);
    echo json_encode(["mensaje" => "Dueño actualizado con éxito."]);
} elseif ($accion === 'eliminar') {
    $id = $_GET['id'];
    $dueños->eliminar($id);
    echo json_encode(["mensaje" => "Dueño eliminado con éxito."]);
} elseif ($accion === 'buscar') {
    $id = $_GET['id'];
    echo json_encode($dueños->buscar($id));
}
?>
