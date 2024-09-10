<?php

$disciplinas = [];
if (file_exists("disciplinas.txt")) {
    $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao abrir arquivo");
    while (($linha = fgets($arqDisc)) !== false) {
        $disciplinas[] = explode(";", trim($linha));
    }
    fclose($arqDisc);
}

$id = $_GET['id'] ?? -1;
if ($id == -1 || !isset($disciplinas[$id])) {
    die("Disciplina não encontrada");
}

$disciplina = $disciplinas[$id];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $carga = $_POST['carga'];

    $disciplinas[$id] = [$nome, $sigla, $carga];

    $arqDisc = fopen("disciplinas.txt", "w") or die("erro ao abrir arquivo");
    foreach ($disciplinas as $disciplina) {
        $linha = implode(";", $disciplina) . "\n";
        fwrite($arqDisc, $linha);
    }
    fclose($arqDisc);

    header("Location: listarDisciplinas.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Disciplina</title>
    <link rel="stylesheet" href="../style/alterarDisciplina.css">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="criarDisciplina.php">Incluir Disciplinas</a></li>
                <li><a href="listarDisciplinas.php">Listar Disciplinas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Alterar Disciplina</h2>

        <form action="alterarDisciplina.php?id=<?php echo $id; ?>" method="POST">
            Nome: <input type="text" name="nome" value="<?php echo "$disciplina[0]"; ?>">
            <br><br>
            Sigla: <input type="text" name="sigla" value="<?php echo "$disciplina[1]"; ?>">
            <br><br>
            Carga Horária: <input type="text" name="carga" value="<?php echo "$disciplina[2]"; ?>">
            <br><br>
            <input type="submit" value="Salvar Alterações">
        </form>
    </main>

</body>

</html>