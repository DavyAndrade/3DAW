<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "escola";

// Criando a conexão com o banco de dados
$conn = new mysqli($server, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebendo os dados do formulário e validando-os
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $matricula = $_POST["matricula"];

    // Preparando a consulta SQL para inserir os dados corretos
    $comandoSQL = $conn->prepare("INSERT INTO `alunos` (nome, cpf, dataNascimento, matricula) VALUES (?, ?, ?, ?)");

    // Definindo os tipos dos dados ("ssss" indica quatro strings)
    $comandoSQL->bind_param("ssss", $nome, $cpf, $dataNascimento, $matricula);

    // Executando o comando SQL
    if ($comandoSQL->execute()) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    // Fechando os recursos da conexão
    $comandoSQL->close();
    $conn->close();
}
