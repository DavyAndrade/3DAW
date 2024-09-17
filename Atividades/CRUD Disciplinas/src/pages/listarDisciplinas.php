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
    <title>Lista de Disciplinas</title>
    <link rel="stylesheet" href="../style/listarDisciplinas.css">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="criarDisciplina.php">Criar Disciplinas</a></li>
                <li><a href="listarDisciplinas.php">Listar Disciplinas</a></li>
                <li><a href="buscarDisciplina.php">Buscar Disciplina</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Disciplinas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th>Carga Horária</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($disciplinas) > 0): ?>
                    <?php foreach ($disciplinas as $index => $disciplina): ?>
                        <tr>
                            <td><?php echo "$disciplina[0]"; ?></td>
                            <td><?php echo "$disciplina[1]"; ?></td>
                            <td><?php echo "$disciplina[2]"; ?></td>
                            <td>
                                <a href="alterarDisciplina.php?id=<?php echo $index; ?>">Editar</a> |
                                <a href="deletarDisciplina.php?id=<?php echo $index; ?>" onclick="return confirm('Tem certeza que deseja deletar essa disciplina?')">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhuma disciplina cadastrada</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>

</html>