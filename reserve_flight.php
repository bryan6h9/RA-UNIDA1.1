<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flight_reservation";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Reservar vuelo
$user_id = $_POST['user_id'];
$flight_id = $_POST['flight_id'];

// Preparar la consulta
$stmt = $conn->prepare("INSERT INTO Reservations (user_id, flight_id) VALUES (?, ?)");
$stmt->bind_param("ii", $user_id, $flight_id); // Asumiendo que user_id y flight_id son enteros

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Reservation successful";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la declaración
$stmt->close();
