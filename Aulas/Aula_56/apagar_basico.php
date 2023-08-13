<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - DELETE</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Apagar Usuário</h2>
    <?php
        $id = 19;
        $query_usuario = "DELETE FROM usuarios WHERE id=:id LIMIT 1";
        $apagar_usuario = $conn->prepare($query_usuario);
        $apagar_usuario->bindParam(":id", $id, PDO::PARAM_INT);
        if ($apagar_usuario->execute()){
            echo "Usuário apagado com sucesso";
        } else {
            echo "ERRO: Usuário não apagado com sucesso";
        }
    ?>
</body>

</html>