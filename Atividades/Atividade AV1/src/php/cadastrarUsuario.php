<?php
header('Content-Type: application/json'); // Define o tipo de conteúdo para JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true); // Lê o JSON do corpo da requisição
    $username = $data["username"];
    $email = $data["email"];
    $senha = $data["senha"];

    $arqUsers = fopen("users.txt", "a") or die("erro ao criar arquivo");

    $linha = $username . ";" . $email . ";" . $senha . "\n";
    fwrite($arqUsers, $linha);
    fclose($arqUsers);

    echo json_encode(["status" => "success", "message" => "Usuário cadastrado com sucesso!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Método não permitido."]);
}
