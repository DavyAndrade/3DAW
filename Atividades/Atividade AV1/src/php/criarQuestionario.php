<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = $_POST["pergunta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $gabarito = $_POST["gabarito"];

    $arqQuestao = fopen("questoes.txt", "a") or die("erro ao criar arquivo");

    $linha = "{$pergunta};{$a};{$b};{$c};{$d};{$gabarito}\n";

    fwrite($arqQuestao, $linha);
    fclose($arqQuestao);
}