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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../style/cadastrarUsuario.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="cadastrarUsuario.php">Cadastrar Usuário</a></li>
                <li><a href="criarQuestionario.php">Criar Questão</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Cadastro de Usuário</h1>
        <form action="cadastrarUsuario.php" method="POST">
            <label for="username">Nome: </label>
            <input type="text" name="username" placeholder="Nome" required>
            <br><br>
            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Email" required>
            <br><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" placeholder="Senha" required>
            <br><br>
            <input type="submit" value="Cadastrar Usuário">
        </form>
    </main>
</body>

</html>