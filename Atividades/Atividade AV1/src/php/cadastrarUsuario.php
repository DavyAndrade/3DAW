<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificando se todos os campos foram preenchidos
    if (empty($username) || empty($email) || empty($senha)) {
        echo "Todos os campos devem ser preenchidos.";
        exit;
    }

    // Caminho para o arquivo
    $arqUsers = fopen("../data/users.txt", "a") or die("Erro ao abrir o arquivo");

    // Formatando a linha para ser escrita no arquivo
    $linha = $username . ";" . $email . ";" . $senha . "\n";

    // Escrevendo a linha no arquivo
    fwrite($arqUsers, $linha);
    fclose($arqUsers);

    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Método de requisição inválido.";
}