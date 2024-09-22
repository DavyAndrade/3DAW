<?php
$disciplinas = [];
$busca = '';
$resultados = [];

if (file_exists("disciplinas.txt")) {
    $arqDisc = fopen("disciplinas.txt", "r") or die("Erro ao abrir arquivo");
    while (($linha = fgets($arqDisc)) !== false) {
        $disciplinas[] = explode(";", trim($linha));
    }
    fclose($arqDisc);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $busca = trim($_POST['busca']);

    if (!empty($busca)) {
        foreach ($disciplinas as $disciplina) {
            if (stripos($disciplina[0], $busca) !== false || stripos($disciplina[1], $busca) !== false) {
                $resultados[] = $disciplina;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Disciplina</title>
    <link rel="stylesheet" href="../style/buscarDisciplina.css">
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
        <h2>Buscar Disciplina</h2>
        <form action="buscarDisciplina.php" method="POST">
            <input type="text" name="busca" placeholder="Nome ou Sigla da Disciplina" value="<?php echo "$busca"; ?>">
            <input type="submit" value="Buscar">
        </form>

        <?php if (!empty($busca)): ?>
            <h3>Resultados da Busca para "<?php echo "$busca"; ?>"</h3>
            <?php if (count($resultados) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Carga Horária</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $disciplina): ?>
                            <tr>
                                <td><?php echo "$disciplina[0]"; ?></td>
                                <td><?php echo "$disciplina[1]"; ?></td>
                                <td><?php echo "$disciplina[2]"; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhuma disciplina encontrada para "<?php echo "$busca"; ?>"</p>
            <?php endif; ?>
        <?php endif; ?>
    </main>
</body>

</html>