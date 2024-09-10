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
    <div class="form-container">
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
    </div>
</body>

</html>