<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];

    $arqDisc = fopen(__DIR__ . "/disciplinas.txt", "a") or die("erro ao criar arquivo");

    $linha = $nome . ";" . $sigla . ";" . $carga . "\n";

    fwrite($arqDisc, $linha);
    fclose($arqDisc);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Disciplinas</title>
    <link rel="stylesheet" href="../style/incluirDisciplina.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="incluirDisciplinas.php">Incluir Disciplinas</a></li>
                <li><a href="alterarDisciplinas.php">Alterar Disciplinas</a></li>
                <li><a href="listarDisciplinas.php">Listar Disciplinas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Criar Nova Disciplina</h1>
        <form action="incluirDisciplinas.php" method="POST">
            Nome: <input type="text" name="nome">
            <br><br>
            Sigla: <input type="text" name="sigla">
            <br><br>
            Carga Horaria: <input type="text" name="carga">
            <br><br>
            <input type="submit" value="Criar Nova Disciplina">
        </form>
    </main>
</body>

</html>