<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Static</title>
</head>
<body>
    <?php
        require_once("./Disciplina.php");

        // Acessar o atributo sem criar o objeto
        echo "Média:" . Disciplina::$media . "<br><hr>";

        $disciplina = new Disciplina("Luiz", 4 ,8);

        echo $disciplina->situacao();

        // Acessar o método sem criar o objeto
        echo Disciplina::situacaoAluno(7);
        
    ?>
</body>
</html>