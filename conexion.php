<?php
function conectarDB() {
    $host = getenv('MYSQLHOST');
    $port = getenv('MYSQLPORT');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');
    $db = getenv('MYSQLDATABASE');

    if ($host) {
        $host = $host . ':' . $port;
    }

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        error_log("Error DB: " . mysqli_connect_error());
        return null;
    }
    mysqli_set_charset($conn, "utf8mb4");
    return $conn;
}
?>
