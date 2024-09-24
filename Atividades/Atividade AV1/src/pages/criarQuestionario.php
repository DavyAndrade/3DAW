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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Questão</title>
    <link rel="stylesheet" href="../style/criarQuestionario.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="cadastrarUsuario.php">Cadastrar Usuário</a></li>
                <li><a href="criarQuestionario.php">Criar Questão</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Criar Questionário</h1>
        <form action="criarQuestionario.php" method="POST">
            <div>
                Questão: <input type="text" name="pergunta" placeholder="Escreva a Questão" required>
            </div>
            <br><br>
            <div>
                Alternativa A: <input type="text" name="a" placeholder="Alternativa A" required>
            </div>
            <br><br>
            <div>
                Alternativa B: <input type="text" name="b" placeholder="Alternativa B" required>
            </div>
            <br><br>
            <div>
                Alternativa C: <input type="text" name="c" placeholder="Alternativa C" required>
            </div>
            <br><br>
            <div>
                Alternativa D: <input type="text" name="d" placeholder="Alternativa D" required>
            </div>
            <br><br>
            <div>
                Resposta Correta: <input type="text" name="gabarito" placeholder="Resposta Correta" required>
            </div>
            <br><br>
            <input type="submit" value="Criar Questão">
        </form>
    </main>
</body>

</html>