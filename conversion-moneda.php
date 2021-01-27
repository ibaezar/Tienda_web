<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $numero = 9990;

    $convertido = number_format($numero, 0, ",", ".");

    echo 'Resultado: '.$convertido;

    var_dump($convertido);
    
    ?>
</body>
</html>