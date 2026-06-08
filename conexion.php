<?php

function conectarDB() {
    $hostname = "mysql.railway.internal"; 
    $username = "root";                   
    $password = "IKhnqMkMiERxoYlsQgmqaOEkvZWptWuv"; 
    $database = "railway";               
    $port     = 3306;                     

    // Crear la conexión usando MySQLi
    $conexion = new mysqli($hostname, $username, $password, $database, $port);

    // Verificar si hay errores de conexión
    if ($conexion->connect_error) {
        // En un API es mejor retornar false en lugar de un 'die' para que api.php maneje el error ordenadamente
        return false;
    }

    // Configurar codificación de caracteres a UTF-8
    $conexion->set_charset("utf8");

    // ¡CRUCIAL! Retornar la conexión para que api.php pueda usarla
    return $conexion;
}
?>
