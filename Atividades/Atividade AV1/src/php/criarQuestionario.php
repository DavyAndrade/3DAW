<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = $_POST["pergunta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $gabarito = $_POST["gabarito"];

    // Validando os campos
    if (empty($pergunta) || empty($a) || empty($b) || empty($c) || empty($d) || empty($gabarito)) {
        echo "Todos os campos devem ser preenchidos.";
        exit;
    }

    // Caminho para o arquivo
    $arqQuestao = fopen("../data/questoes.txt", "a") or die("erro ao criar arquivo");

    // Formatando a linha para escrita no arquivo
    $linha = "{$pergunta};{$a};{$b};{$c};{$d};{$gabarito}\n";

    // Escrevendo a linha no arquivo e fechando o arquivo
    fwrite($arqQuestao, $linha);
    fclose($arqQuestao);
}
