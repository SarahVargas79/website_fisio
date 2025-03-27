<?php
session_start();
require_once('conectar.php');

// Verificando a conexão com o banco de dados
if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Protegendo contra SQL Injection
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);

    // Verificando se os campos foram preenchidos corretamente
    if (empty($nome) || empty($sobrenome) || empty($email) || empty($whatsapp)) {
        $_SESSION['mensagem'] = 'Por favor, preencha todos os campos.';
        header('Location: ../index.php');
        exit;
    }

    // Query de inserção
    $query = "INSERT INTO contatos (nome, sobrenome, email, whatsapp) VALUES ('$nome', '$sobrenome', '$email', '$whatsapp')";

    // Executando a consulta e verificando se deu certo
    if (mysqli_query($conn, $query)) {
        $_SESSION['mensagem'] = ['texto' => 'Mensagem enviada com sucesso!', 'tipo' => 'sucesso'];
    } else {
        $_SESSION['mensagem'] = ['texto' => 'Erro ao enviar mensagem: ' . mysqli_error($conn), 'tipo' => 'erro'];
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);

    // Redireciona para a página inicial
    header('Location: ../index.php');
    exit;
} else {
    $_SESSION['mensagem'] = 'Método de envio inválido.';
    header('Location: ../index.php');
    exit;
}
