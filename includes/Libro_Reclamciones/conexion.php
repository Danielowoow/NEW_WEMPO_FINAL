<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "admin1234"; // Contraseña de la base de datos
$dbname = "db_wempo"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Configurar el juego de caracteres a UTF-8 (opcional, pero recomendado)
$conn->set_charset("utf8");

?>
