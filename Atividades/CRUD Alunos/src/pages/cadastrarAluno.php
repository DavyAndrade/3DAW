<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $matricula = $_POST["matricula"];
    $anoIngresso = $_POST["anoIngresso"];

    $arqDisc = fopen("alunos.txt", "a") or die("erro ao criar arquivo");

    $linha = "{$nome};{$cpf};{$dataNascimento};{$matricula};{$anoIngresso}\n";

    fwrite($arqDisc, $linha);
    fclose($arqDisc);
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
            Nome: <input type="text" name="nome" placeholder="Nome do Aluno">
            <br><br>
            CPF: <input type="text" name="cpf" placeholder="CPF do Aluno">
            <br><br>
            Data de Nascimento: <input type="text" name="dataNascimento" placeholder="Data de Nascimento">
            <br><br>
            Matrícula: <input type="text" name="matricula" placeholder="Matrícula do Aluno">
            <br><br>
            Ano de Ingresso: <input type="text" name="anoIngresso" placeholder="Ano de Ingresso">
            <br><br>
            <input type="submit" value="Criar Nova Disciplina">
        </form>
    </main>
</body>

</html>