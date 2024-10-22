<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = $_POST["pergunta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $gabarito = $_POST["gabarito"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "Teste";

    $conn = new mysqli($servidor, $username, $senha, $database);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $comando = "INSERT pergunta, a, b, c, d, gabarito VALUES ('{$pergunta}', '{$a}', '{$b}', '{$c}', '{$d}', '{$gabarito}')";

    // Formatando a linha para escrita no arquivo
    $linha = "{$pergunta};{$a};{$b};{$c};{$d};{$gabarito}\n";
}
