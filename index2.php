/**
index2.php - Copiar el archivo JSON de las habitaciones ficticios al proyecto (rooms.json), 
importar el archivo en index2.php y muestra el contenido dentro de una etiqueta <pre></pre>
*/

<?php
$roomsJson = file_get_contents("rooms.json");
$rooms = json_decode($roomsJson, true);

echo "<pre>";
print_r($rooms);
echo "</pre>";