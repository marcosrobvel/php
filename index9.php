<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="name"><br>
    <label>Descripción:</label><br>
    <textarea name="description"></textarea><br>
    <input type="submit" value="Crear Habitación">
</form>

<?php
$conn = new mysqli("localhost", "root", "root", "miranda_backend_sql");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["roomType"];
    $desc = $_POST["amenities"];

    $stmt = $conn->prepare("INSERT INTO ROOM (roomType, amenities) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $desc);

    if ($stmt->execute()) {
        $last_id = $conn->insert_id;
        echo "<p>Habitación creada con éxito. <a href='index6.php?id=$last_id'>Ver habitación</a></p>";
    } else {
        echo "Error al guardar la habitación.";
    }

    $stmt->close();
}

$conn->close();
