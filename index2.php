<?php
$roomsJson = file_get_contents("rooms.json");
$rooms = json_decode($roomsJson, true);

echo "<pre>";
print_r($rooms);
echo "</pre>";