<?php
$roomsJson = file_get_contents("rooms.json");
$rooms = json_decode($roomsJson, true);

echo "<ol>";
foreach ($rooms as $room) {
    echo "<li>";
    
    if (isset($room['roomType'])) {
        echo "Room Type: " . $room['roomType'] . "<br>";
    } else {
        echo "Room Type: No Room Type<br>";
    }

    if (isset($room['roomNumber'])) {
        echo "Room Number: " . $room['roomNumber'] . "<br>";
    } else {
        echo "Room Number: No Room Number<br>";
    }

    if (isset($room['price'])) {
        echo "Price: $" . number_format($room['price'], 2) . "<br>";
    } else {
        echo "Price: No Price<br>";
    }

    if (isset($room['offer_price'])) {
        echo "Offer Price: $" . number_format($room['offer_price'], 2) . "<br>";
    } else {
        echo "Offer Price: No Offer Price<br>";
    }

    if (isset($room['amenities'])) {
        echo "Amenities: " . $room['amenities'] . "<br>";
    } else {
        echo "Amenities: No Amenities<br>";
    }

    if (isset($room['status'])) {
        echo "Status: " . $room['status'] . "<br>";
    } else {
        echo "Status: No Status<br>";
    }

    echo "</li>";
}
echo "</ol>";
?>