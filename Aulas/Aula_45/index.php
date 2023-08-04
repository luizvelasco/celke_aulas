<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Where</title>
</head>
<body>
    <h2>Visualizar Usuários</h2>
    <?php
        $query_usuario = "SELECT id, nome, email FROM usuarios WHERE sits_usuario_id = 1 LIMIT 10";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->execute();
        
        while ($row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC)){
            // var_dump($row_usuario);
            extract($row_usuario);
            echo "ID: " . $id . "<br>";
            echo "Nome: " . $nome . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "<hr>";
        }
        
    ?>

    <h2>Visualizar Usuários com nível de acesso Administrador</h2>
    <?php
        $query_usuario = "SELECT id, nome, email FROM usuarios WHERE niveis_acesso_id = 2";
        $result_usuarios = $conn->prepare($query_usuario);
        $result_usuarios->execute();
        
        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            // var_dump($row_usuario);
            extract($row_usuario);
            echo "ID: " . $id . "<br>";
            echo "Nome: " . $nome . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "<hr>";
        }
        
    ?>
</body>
</html>

