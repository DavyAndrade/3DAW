<?php
$msg = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];

    // Abre o arquivo disciplinas.txt para adicionar a nova disciplina
    $arqDisc = fopen("disciplinas.txt", "a") or die("erro ao criar arquivo");

    // Cria a linha com os dados da nova disciplina
    $linha = $nome . ";" . $sigla . ";" . $carga . "\n";

    // Escreve a linha no arquivo e fecha o arquivo
    fwrite($arqDisc, $linha);
    fclose($arqDisc);
}

// Lê as disciplinas do arquivo para exibição
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
<html>

<head>
    <title>Criar Nova Disciplina</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <h1>Criar Nova Disciplina</h1>
        <form action="index.php" method="POST">
            Nome: <input type="text" name="nome">
            <br><br>
            Sigla: <input type="text" name="sigla">
            <br><br>
            Carga Horaria: <input type="text" name="carga">
            <br><br>
            <input type="submit" value="Criar Nova Disciplina">
        </form>
    </div>

    <div class="lista-container">
        <h2>Lista de Disciplinas</h2>
        <ul>
            <?php foreach ($disciplinas as $disciplina): ?>
                <li><?php echo "Nome: " . "$disciplina[0]" . " | Sigla: " . $disciplina[1] . " | Carga Horária: " . $disciplina[2]; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>