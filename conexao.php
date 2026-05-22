<?php
$host = "sql7.freesqldatabase.com";
$user = "sql7827923";
$pass = "fIc1jBdcEJ";
$db   = "sql7827923";
$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>