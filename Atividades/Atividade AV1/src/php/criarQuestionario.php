<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "teste";

// Criando a conexão com o banco de dados
$conn = new mysqli($servidor, $username, $senha, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = $_POST["pergunta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $gabarito = $_POST["gabarito"];

    // Validando os campos
    $comandoSQL = $conn->prepare("INSERT INTO `perguntas` (pergunta, a, b, c, d, gabarito) VALUES (?, ?, ?, ?, ?, ?)");

    // Definindo os tipos dos dados
    $comandoSQL->bind_param("ssssss", $pergunta, $a, $b, $c, $d, $gabarito);

    // Executando o comando SQL
    if ($comandoSQL->execute()) {
        echo "Pergunta cadastrada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    // Fechando os recursos da conexão
    $comandoSQL->close();
    $conn->close();
}
