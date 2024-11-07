<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "escola";

// Criando a conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultando os alunos no banco de dados
$sql = "SELECT id, nome, cpf, dataNascimento, matricula FROM alunos";
$result = $conn->query($sql);

// Inicializando o array de alunos
$alunos = [];

// Verificando se há alunos
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alunos[] = $row;  // Adiciona cada aluno no array
    }
} else {
    $alunos = [];  // Se não houver alunos, retorna um array vazio
}

// Definindo o cabeçalho de resposta como JSON
header('Content-Type: application/json');

// Retornando os dados dos alunos como JSON
echo json_encode($alunos);

// Fechando a conexão
$conn->close();
