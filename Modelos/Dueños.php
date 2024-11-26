<?php
require_once '../Configuracion/conexion.php';

class Dueños {
    private $conn;

    public function __construct() {
        $this->conn = (new Conexion())->conn;
    }

    public function listar() {
        $sql = "SELECT * FROM dueños";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $telefono, $direccion) {
        $sql = "INSERT INTO dueños (nombre, telefono, direccion) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $telefono, $direccion]);
    }

    public function actualizar($id, $nombre, $telefono, $direccion) {
        $sql = "UPDATE dueños SET nombre = ?, telefono = ?, direccion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $telefono, $direccion, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM dueños WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscar($id) {
        $sql = "SELECT * FROM dueños WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
