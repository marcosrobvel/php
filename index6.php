/**
index6.php - Acceder la página con un query param (localhost:8000/index4.php?id=1). 
Conectar a la base de datos de MySQL utilizando mysqli. Hacer una consulta para obtener una habitación (con el ID de GET) 
y mostrarla abajo utilizando el código de index4.php

*/

<?php
$conn = new mysqli("localhost", "root", "root", "miranda_backend_sql");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['roomNumber'])) {
    $stmt = $conn->prepare("SELECT * FROM ROOM WHERE roomNumber = ?");
    $stmt->bind_param("i", $_GET['roomNumber']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo "<h2>" . htmlspecialchars($row["roomType"]) . "</h2>";
        echo "<p><strong>Amenities:</strong> " . htmlspecialchars($row["amenities"]) . "</p>";
        echo "<p><strong>Precio:</strong> $" . htmlspecialchars($row["price"]) . "</p>";
    } else {
        echo "Habitación no encontrada.";
    }

    $stmt->close();
} else {
    echo "Por favor, proporcione un número de habitación (roomNumber).";
}

$conn->close();
