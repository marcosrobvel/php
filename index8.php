/**
index8.php - Mostrar un formulario (method=”POST” y sin action) para crear una nueva habitación. 
Si accedes a la página con una peticion POST, mostrar la habitación nueva con el código de index4.php

*/

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
