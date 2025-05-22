<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="name"><br>
    <label>Descripción:</label><br>
    <textarea name="description"></textarea><br>
    <input type="submit" value="Crear Habitación">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["roomType"];
    $desc = $_POST["amenities"];

    echo "<h2>" . htmlspecialchars($name) . "</h2>";
    echo "<p>" . htmlspecialchars($desc) . "</p>";
}
?>
