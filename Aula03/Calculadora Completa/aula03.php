<?php
$a = $_GET['a'];
$b = $_GET['b'];
$tipo = $_GET['tipo'];
$result = 0;

switch ($tipo) {
    case 'soma':
        $result = $a + $b;
        break;

    case 'subtração':
        $result = $a - $b;
        break;

    case 'divisão':
        $result = $a / $b;
        break;

    case 'multiplicação':
        $result = $a * $b;
        break;

    case 'raiz':
        $result = sqrt($a);
        break;

    case 'cos':
        $result = cos($a);
        break;

    case 'sin':
        $result = sin($a);
        break;

    case 'tan':
        $result = tan($a);
        break;

    case 'troca':
        if ($a != 0) {
            $result = $a * (-1);
        } else {
            $result = $a;
        }
        break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
    <link rel="stylesheet" href="../Aula 03/style.css">
</head>

<body>

    <h1><a href="calculadoraCompleta.html">Calculadora</a></h1>
    <?php
    echo "<h1>Resultado: $result</h1>";
    ?>

</body>

</html>