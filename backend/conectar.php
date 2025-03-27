<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fisioterapia_luana';

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die('Conexão falhou: ' . $conn->connect_error);
}
