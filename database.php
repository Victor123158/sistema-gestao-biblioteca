<?php
$host = 'localhost';
$db   = 'biblioteca';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Erro de conexão com a base de dados: ' . $conn->connect_error);
}

$conn->set_charset('utf8mb4');
?>
