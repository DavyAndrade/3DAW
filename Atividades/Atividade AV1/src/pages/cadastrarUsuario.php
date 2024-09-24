<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $arqUsers = fopen("users.txt", "a") or die("erro ao criar arquivo");

    $linha = $nome . ";" . $email . ";" . $senha . "\n";

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
            Nome: <input type="text" name="nome" placeholder="Nome">
                <br><br>
            Email: <input type="email" name="email" placeholder="Email">
            <br><br>
            Senha: <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input type="submit" value="Cadastrar Usuário">
        </form>
    </main>
</body>

</html>