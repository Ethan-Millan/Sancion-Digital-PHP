<?php
$mysqli = new mysqli("localhost", "root", "", "EstanciaII");

// Verificar conexión
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Establecer el conjunto de caracteres a utf8mb4
if (!$mysqli->set_charset("utf8mb4")) {
    echo "Error al establecer el conjunto de caracteres utf8mb4: (" . $mysqli->errno . ") " . $mysqli->error;
}

?>
