<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $json = file_get_contents('rooms.json');
    $rooms = json_decode($json, true);

    $found = false;

    foreach ($rooms as $room) {
        if ($room['id'] === $id) {
            echo "<h2>Habitación encontrada:</h2>";
            echo "<p><strong>Nombre:</strong> " . htmlspecialchars($room['roomType']) . "</p>";
            echo "<p><strong>Número:</strong> " . htmlspecialchars($room['roomNumber']) . "</p>";
            echo "<p><strong>Precio:</strong> $" . htmlspecialchars($room['price']) . "</p>";
          //  echo "<p><strong>Descuento:</strong> " . htmlspecialchars($room['offer_price']) . "%</p>";
            
            if ($room['price'] > $room['offer_price']) {
                $discount = 100 - ($room['offer_price'] / $room['price']) * 100;
                echo "<p><strong>Descuento:</strong> " . round($discount) . "%</p>";
            } else {
                echo "<p><strong>Descuento:</strong> Sin descuento</p>";
            }

            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "<p>No se encontró ninguna habitación con ID = $id.</p>";
    }
} else {
    echo "<p>Por favor proporciona un ID en la URL (por ejemplo: ?id=1).</p>";
}
