<?php
include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];
$matricula = $_POST['matricula'];

$sql = "UPDATE alunos SET nome = '$nome', cpf = '$cpf', dataNascimento = '$dataNascimento', matricula = '$matricula' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Aluno atualizado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();