/**
index5.php - Conectar a la base de datos de MySQL utilizando mysqli. Hacer una consulta para obtener 
las habitaciones y mostrarlas abajo utilizando el código de index3.php
*/

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