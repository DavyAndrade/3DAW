<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $arqUsers = fopen("users.txt", "a") or die("erro ao criar arquivo");

    $linha = $username . ";" . $email . ";" . $senha . "\n";

    fwrite($arqUsers, $linha);
    fclose($arqUsers);
}