<?php
$hostname = "mysql.railway.internal"; 
$username = "root";                   
$password = "IKhnqMkMiERxoYlsQgmqaOEkvZWptWuv"; 
$database = "railway";               
$port     = 3306;                     

// Crear la conexión usando MySQLi
$conexion = new mysqli($hostname, $username, $password, $database, $port);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Error de conexión: " . $conexion->connect_error
    ]));
}

// Configurar codificación de caracteres a UTF-8
$conexion->set_charset("utf8");
?>
