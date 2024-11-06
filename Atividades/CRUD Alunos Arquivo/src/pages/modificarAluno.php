<?php

$alunos = [];
if (file_exists("alunos.txt")) {
    $arqAlun = fopen("alunos.txt", "r") or die("erro ao abrir arquivo");
    while (($linha = fgets($arqAlun)) !== false) {
        $alunos[] = explode(";", trim($linha));
    }
    fclose($arqAlun);
}

$id = $_GET['id'];
if ($id == -1 || !isset($alunos[$id])) {
    die("Aluno não encontrado");
}

$aluno = $alunos[$id];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $matricula = $_POST["matricula"];
    $anoIngresso = $_POST["anoIngresso"];

    $alunos[$id] = [$nome, $cpf, $dataNascimento, $matricula, $anoIngresso];

    $arqAlun = fopen("alunos.txt", "w") or die("erro ao abrir arquivo");
    foreach ($alunos as $aluno) {
        $linha = implode(";", $aluno) . "\n";
        fwrite($arqAlun, $linha);
    }
    fclose($arqAlun);

    header("Location: listarAlunos.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Disciplina</title>
    <link rel="stylesheet" href="../style/modificarAluno.css">
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
        <h2>Alterar Disciplina</h2>

        <form action="modificarAluno.php?id=<?php echo $id; ?>" method="POST">
            Nome: <input type="text" name="nome" value="<?php echo "$aluno[0]"; ?>">
            <br><br>
            CPF: <input type="text" name="cpf" value="<?php echo "$aluno[1]"; ?>">
            <br><br>
            Data de Nascimento: <input type="text" name="dataNascimento" value="<?php echo "$aluno[2]"; ?>">
            <br><br>
            Matrícula: <input type="text" name="matricula" value="<?php echo "$aluno[3]"; ?>">
            <br><br>
            Ano de Ingresso: <input type="text" name="anoIngresso" value="<?php echo "$aluno[4]"; ?>">
            <br><br>
            <input type="submit" value="Salvar Alterações">
        </form>
    </main>

</body>

</html>