<?php
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM ROOM WHERE roomNumber = ?");
    $stmt->bind_param("i", $_GET['roomNumber']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo "<h2>" . htmlspecialchars($row["roomType"]) . "</h2>";
        echo "<p>" . htmlspecialchars($row["amenities"]) . "</p>";
    } else {
        echo "Habitación no encontrada.";
    }

    $stmt->close();
}

$conn->close();
?>
