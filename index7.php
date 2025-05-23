/**
index7.php - Utilizar el código de index5.php para mostrar todas las habitaciones, pero incluir un formulario 
(sin method y sin action) para buscar también. Utilizar un if para ver si has buscado y hacer una consulta diferente 
para obtener las habitaciones WHERE name LIKE <search>

*/

<?php
$conn = new mysqli("localhost", "root", "root", "miranda_backend_sql");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

echo '<form>';
echo '<input type="text" name="search" value="' . htmlspecialchars($search) . '">';
echo '<input type="submit" value="Buscar">';
echo '</form>';

if ($search) {
    $stmt = $conn->prepare("SELECT * FROM ROOM WHERE name LIKE ?");
    $like = "%" . $search . "%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM ROOM");
}

echo "<h1>Habitaciones</h1>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . htmlspecialchars($row["roomType"]) . "</h2>";
        echo "<p>" . htmlspecialchars($row["amenities"]) . "</p>";
        echo "</div>";
    }
} else {
    echo "No hay habitaciones.";
}

$conn->close();