<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes Abstratas</title>
</head>
<body>
    <?php
        require_once ("./Cheque.php");
        require_once ("./ChequeComum.php");
        require_once ("./ChequeEspecial.php");

        // $cheque = new Cheque(207.25, "Comum");
        // echo $cheque->verValor();

        $chequeComum = new ChequeComum(307.37, "Comum");
        echo $chequeComum->calcularJuro();

        $chequeEspecial = new ChequeEspecial(408.99, "Especial");
        echo $chequeEspecial->calcularJuro();
    ?>
</body>
</html>