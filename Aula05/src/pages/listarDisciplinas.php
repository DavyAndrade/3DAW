<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Disciplinas</title>
</head>
<body>
    <h1>Lista de Disciplinas</h1>
    <ul>
        <?php
        $disciplinas = [
            ['Matemática', 'MAT', 40],
            ['Português', 'PORT', 30],
            ['Física', 'FIS', 45]
        ];

        foreach ($disciplinas as $disciplina) {
            echo "<li>$disciplina[0] - $disciplina[1] - $disciplina[2] horas</li>";
        }
       ?>
    </ul>
    <a href="incluirDisciplina.php">Incluir Disciplina</a>
</body>
</html>