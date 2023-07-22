<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Métodos e Atributos</title>
</head>
<body>
    <?php
        require './Usuario.php';
        $usuario = new Usuario();
        $nome = "Luiz";
        $email = "luizvelasco@gmail.com";
        $idade = 37;

        $msg = $usuario->cadastrar($nome, $email, $idade);

        echo $msg;
    ?>
</body>
</html>