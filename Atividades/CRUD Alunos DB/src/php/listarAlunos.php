<?php
include 'conexao.php';

$sql = "SELECT id, nome, cpf, dataNascimento, matricula FROM alunos";
$result = $conn->query($sql);

$alunos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alunos[] = $row;
    }
} else {
    $alunos = [];
}

header('Content-Type: application/json');

echo json_encode($alunos);

$conn->close();