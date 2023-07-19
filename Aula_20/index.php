<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <?php
        require_once("./Funcionario.php");

        $funcionario = new Funcionario();
        $funcionario->nome = "Luiz";
        $funcionario->salario = 1050.69;

        echo $funcionario->verSalario();
    ?>
</body>
</html>