<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Operadores AND & OR</title>
</head>
<body>
    <h2>Listar Usuários com duas condições</h2>
    <?php
        $query_usuarios =   "SELECT id, nome, email, sits_usuario_id, niveis_acesso_id
                            FROM usuarios 
                            WHERE sits_usuario_id = 1 
                            AND niveis_acesso_id = 3";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();
        
        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            // var_dump($row_usuario);
            extract($row_usuario);
            echo "ID: " . $id . "<br>";
            echo "Nome: " . $nome . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "ID da situação: " . $sits_usuario_id . "<br>";
            echo "ID do nível de acesso: " . $niveis_acesso_id . "<br>";
            echo "<hr>";
        }
        
    ?>

</body>
</html>

