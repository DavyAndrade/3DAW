<?php

$alunos = [];
if (file_exists("alunos.txt")) {
    $arqDisc = fopen("alunos.txt", "r") or die("erro ao abrir arquivo");
    while (($linha = fgets($arqDisc)) !== false) {
        $alunos[] = explode(";", trim($linha));
    }
    fclose($arqDisc);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../style/listarAlunos.css">
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
        <h2>Lista de Disciplinas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Matricula</th>
                    <th>Ano de Ingresso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($alunos) > 0): ?>
                    <?php foreach ($alunos as $index => $aluno): ?>
                        <tr>
                            <td><?php echo "$aluno[0]"; ?></td>
                            <td><?php echo "$aluno[1]"; ?></td>
                            <td><?php echo "$aluno[2]"; ?></td>
                            <td><?php echo "$aluno[3]"; ?></td>
                            <td><?php echo "$aluno[4]"; ?></td>
                            <td>
                                <a href="alterarDisciplina.php?id=<?php echo $index; ?>">Editar</a> |
                                <a href="deletarDisciplina.php?id=<?php echo $index; ?>" onclick="return confirm('Tem certeza que deseja deletar essa disciplina?')">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhum aluno cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>

</html>