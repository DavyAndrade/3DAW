<?php

// Carregar todas as disciplinas do arquivo
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

// Remover a disciplina do array
unset($disciplinas[$id]);

// Reescrever o arquivo sem a disciplina deletada
$arqDisc = fopen("disciplinas.txt", "w") or die("erro ao abrir arquivo");
foreach ($disciplinas as $disciplina) {
    $linha = implode(";", $disciplina) . "\n";
    fwrite($arqDisc, $linha);
}
fclose($arqDisc);

// Redirecionar de volta para a listagem
header("Location: listarDisciplinas.php");
exit;
