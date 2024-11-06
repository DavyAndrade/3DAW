<?php
$alunos = [];
$busca = '';
$resultados = [];

if (file_exists("alunos.txt")) {
    $arqAlun = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo");
    while (($linha = fgets($arqAlun)) !== false) {
        $alunos[] = explode(";", trim($linha));
    }
    fclose($arqAlun);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $busca = trim($_POST['busca']);

    if (!empty($busca)) {
        foreach ($alunos as $aluno) {
            if (stripos($aluno[1], $busca) !== false || stripos($aluno[3], $busca) !== false) {
                $resultados[] = $aluno;
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
    <title>Buscar Aluno</title>
    <link rel="stylesheet" href="../style/buscarAluno.css">
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
        <h2>Buscar Aluno</h2>
        <form action="buscarAluno.php" method="POST">
            <input type="text" name="busca" placeholder="CPF ou Matricula" value="<?php echo "$busca"; ?>">
            <input type="submit" value="Buscar">
        </form>

        <?php if (!empty($busca)): ?>
            <h3>Resultados da Busca para "<?php echo "$busca"; ?>"</h3>
            <?php if (count($resultados) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>Matricula</th>
                            <th>Ano de Ingresso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $aluno): ?>
                            <tr>
                                <td><?php echo "$aluno[0]"; ?></td>
                                <td><?php echo "$aluno[1]"; ?></td>
                                <td><?php echo "$aluno[2]"; ?></td>
                                <td><?php echo "$aluno[3]"; ?></td>
                                <td><?php echo "$aluno[4]"; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhuma aluno encontrado para "<?php echo "$busca"; ?>"</p>
            <?php endif; ?>
        <?php endif; ?>
    </main>
</body>

</html>