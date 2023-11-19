<?php
$servername = "srv1181.hstgr.io"; // Reemplaza con tu servidor de Hostinger
$username = "u519463083_admin"; // Tu nombre de usuario de la base de datos
$password = "Megustalapera123."; // Tu contraseña de la base de datos
$dbname = "u519463083_db_wempo"; // El nombre de tu base de datos

// Intentar establecer conexión
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn->close();
?>
