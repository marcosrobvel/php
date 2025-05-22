<?php
include 'sql_connection.php';

$sql = "SELECT * FROM ROOM";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["roomNumber"]. " - Nombre: " . $row["roomType"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();