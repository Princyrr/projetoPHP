<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "agenda";

// Cria conexão
$conn = new mysqli($host, $user, $pass, $db);

// Checa conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
