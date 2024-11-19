<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "teste";

// Criando a conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebendo os dados do formulário e validando-os
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Validando os campos
    $comandoSQL = $conn->prepare("INSERT INTO `usuarios` (username, email, senha) VALUES (?, ?, ?)");

    // Definindo os tipos dos dados
    $comandoSQL->bind_param("sss", $username, $email, $senha);

    // Executando o comando SQL
    if ($comandoSQL->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    // Fechando os recursos da conexão
    $comandoSQL->close();
    $conn->close();
}
