<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Formatando a linha para ser escrita no arquivo
    $linha = $username . ";" . $email . ";" . $senha . "\n";

    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Método de requisição inválido.";
}