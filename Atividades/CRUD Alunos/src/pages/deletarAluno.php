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
    die("Aluno não encontrada");
}

unset($alunos[$id]);

$arqAlun = fopen("alunos.txt", "w") or die("erro ao abrir arquivo");
foreach ($alunos as $aluno) {
    $linha = implode(";", $aluno) . "\n";
    fwrite($arqAlun, $linha);
}
fclose($arqAlun);

header("Location: listarAlunos.php");
exit;