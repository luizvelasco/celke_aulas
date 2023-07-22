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

        // Atributo privado não pode ser acessado fora da classe
        // $funcionario->salarioConvertido = "75";

        // método privado não pode ser acessado fora da classe
        // $funcionario->converterSalario(45);
    ?>
</body>
</html>