<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $matricula = $_POST["matricula"];

    $comandoSQL = $conn->prepare("INSERT INTO `alunos` (nome, cpf, dataNascimento, matricula) VALUES (?, ?, ?, ?)");


    $comandoSQL->bind_param("ssss", $nome, $cpf, $dataNascimento, $matricula);

    if ($comandoSQL->execute()) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    $comandoSQL->close();
    $conn->close();
}
