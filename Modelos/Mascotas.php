<?php
require_once '../Configuracion/conexion.php';

class Mascotas {
    private $conn;

    public function __construct() {
        $this->conn = (new Conexion())->conn;
    }

    public function listar() {
        $sql = "SELECT m.id, m.nombre, m.raza, m.edad, d.nombre AS dueño 
                FROM mascotas m
                JOIN dueños d ON m.id_dueño = d.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $raza, $edad, $id_dueño) {
        $sql = "INSERT INTO mascotas (nombre, raza, edad, id_dueño) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $raza, $edad, $id_dueño]);
    }

    public function actualizar($id, $nombre, $raza, $edad) {
        $sql = "UPDATE mascotas SET nombre = ?, raza = ?, edad = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $raza, $edad, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM mascotas WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscar($id) {
        $sql = "SELECT m.id, m.nombre, m.raza, m.edad, d.nombre AS dueño 
                FROM mascotas m
                JOIN dueños d ON m.id_dueño = d.id
                WHERE m.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
