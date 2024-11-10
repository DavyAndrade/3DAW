<?php
include 'conexao.php';

$pesquisa = $_GET['pesquisa'];
$sql = "SELECT id, nome, cpf, dataNascimento, matricula FROM alunos WHERE nome LIKE '%$pesquisa%' OR cpf LIKE '%$pesquisa%' OR matricula LIKE '%$pesquisa%'";

$result = $conn->query($sql);

$alunos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alunos[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($alunos);

$conn->close();
