<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = conectarDB();
    if (!$db) {
        echo json_encode(["status" => "error", "message" => "Error de conexión a la BD"]);
        exit;
    }

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : '';

    if (empty($nombre) || empty($email) || empty($telefono)) {
        echo json_encode(["status" => "error", "message" => "Campos incompletos"]);
        mysqli_close($db);
        exit;
    }

    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
    
    if (mysqli_query($db, $sql)) {
        echo json_encode(["status" => "success", "message" => "Usuario guardado en Railway"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al insertar: " . mysqli_error($db)]);
    }

    mysqli_close($db);
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>
