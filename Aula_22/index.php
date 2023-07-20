<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método e atributo protegido</title>
</head>
<body>
    <?php
        require_once("./Funcionario.php");
        require_once("./Bonus.php");

        // ATributo público pode ser acessado fora da classe    
        $funcionario = new Funcionario();
        $funcionario->nome = "Luiz";
        $funcionario->salario = 1050.69;

        echo $funcionario->verSalario();

        // Atributo privado não pode ser acessado fora da classe
        // $funcionario->salarioConvertido = "75";

        // método privado não pode ser acessado fora da classe
        // $funcionario->converterSalario(45);

        // Atributo protegido somente pode ser acessado pela classe e pela classe filha
        // $funcionario->bonus = 54;

        // Método protegido somente pode ser acessado pela classe e pela classe filha
        // $funcionario->bonusCalculado();

        $funcBonus = new Bonus();
        echo $funcBonus->verBonus();
    ?>
</body>
</html>