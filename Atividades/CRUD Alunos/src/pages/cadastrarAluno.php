<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $matricula = $_POST["matricula"];
    $anoIngresso = $_POST["anoIngresso"];

    $arqAlun = fopen("alunos.txt", "a") or die("erro ao criar arquivo");

    $linha = "{$nome};{$cpf};{$dataNascimento};{$matricula};{$anoIngresso}\n";

    fwrite($arqAlun, $linha);
    fclose($arqAlun);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../style/cadastrarAluno.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="cadastrarAluno.php">Cadastrar Aluno</a></li>
                <li><a href="listarAlunos.php">Lista de Alunos</a></li>
                <li><a href="buscarAluno.php">Busca de Aluno</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Cadastrar Novo Aluno</h1>
        <form action="cadastrarAluno.php" method="POST">
            <div>
                Nome: <input type="text" name="nome" placeholder="Nome do Aluno">
            </div>
            <br><br>
            <div>
                CPF: <input type="text" name="cpf" placeholder="CPF do Aluno">
            </div>
            <br><br>
            <div>
                Data de Nascimento: <input type="text" name="dataNascimento" placeholder="Data de Nascimento">
            </div>
            <br><br>
            <div>
                Matrícula: <input type="text" name="matricula" placeholder="Matrícula do Aluno">
            </div>
            <br><br>
            <div>
                Ano de Ingresso: <input type="text" name="anoIngresso" placeholder="Ano de Ingresso">
            </div>
            <br><br>
            <input type="submit" value="Cadastrar Aluno">
        </form>
    </main>
</body>

</html>