<?php

$disciplinas = [];
if (file_exists("disciplinas.txt")) {
    $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao abrir arquivo");
    while (($linha = fgets($arqDisc)) !== false) {
        $disciplinas[] = explode(";", trim($linha));
    }
    fclose($arqDisc);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Disciplinas</title>
    <link rel="stylesheet" href="../style/listarDisciplinas.css">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="criarDisciplinas.php">Incluir Disciplinas</a></li>
                <li><a href="alterarDisciplinas.php">Alterar Disciplinas</a></li>
                <li><a href="listarDisciplinas.php">Listar Disciplinas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Disciplinas</h2>
        <ul>
            <?php foreach ($disciplinas as $disciplina): ?>
                <li><?php echo "Nome: " . "$disciplina[0]" . " | Sigla: " . $disciplina[1] . " | Carga Horária: " . $disciplina[2]; ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>

</html>