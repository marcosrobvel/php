<?php
require __DIR__ . '/vendor/autoload.php';

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/blade/views';
$cache = __DIR__ . '/blade/cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

$jsonPath = __DIR__ . '/rooms.json';

if (!file_exists($jsonPath)) {
    die("Error: El archivo rooms.json no se encontró en $jsonPath");
}

$json = file_get_contents($jsonPath);
if ($json === false) {
    die("Error al leer el archivo JSON");
}

$roomArray = json_decode($json, true);
if ($roomArray === null) {
    die("Error: JSON inválido o mal formado");
}

echo $blade->run("rooms", ["rooms" => $roomArray]);


/*
$sql = "SELECT * FROM ROOM";
$result = $conn->query($sql);

$rooms = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}

$conn->close();

echo $blade->run("rooms", ["rooms" => $rooms]);*/

?>