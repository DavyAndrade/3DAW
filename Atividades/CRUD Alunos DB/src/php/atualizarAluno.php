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
    $idAluno = $_POST["idAluno"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["data_nascimento"];
    $matricula = $_POST["matricula"];

    // Atualizando o aluno no banco de dados
    $comandoSQL = $conn->prepare("UPDATE alunos SET nome = ?, cpf = ?, data_nascimento = ?, matricula = ? WHERE id = ?");

    // Definindo os tipos dos dados
    $comandoSQL->bind_param("ssssi", $nome, $cpf, $dataNascimento, $matricula, $idAluno);

    // Executando o comando SQL
    if ($comandoSQL->execute()) {
        echo "Aluno atualizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    // Fechando os recursos da conexão
    $comandoSQL->close();
    $conn->close();
}
