<?php
$servername = "localhost";
$username = "root";
$password = "30438913";
$dbname = "flight_reservation";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registro de usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'register') {
    $user = $conn->real_escape_string($_POST['username']);
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $conn->real_escape_string($_POST['email']);

    $sql = "INSERT INTO Users (username, password, email) VALUES ('$user', '$pass', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'login') {
    $user = $conn->real_escape_string($_POST['username']);
    $pass = $_POST['password'];
    
    $sql = "SELECT password FROM Users WHERE username='$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            echo "Inicio de sesión exitoso";
        } else {
            echo "Credenciales inválidas";
        }
    } else {
        echo "No existe el usuario";
    }
}

$conn->close();
?>
