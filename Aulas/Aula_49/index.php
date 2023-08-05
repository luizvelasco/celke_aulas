<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - INSERT</title>
</head>
<body>
    <h2>Cadastrar Usuários</h2>
    <?php
        //Colocar valores direto na QUERY 
        // $query = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) 
        //         VALUES ('Cesar11', 'cesar11@celke.com.br', '123456', 3, 3, NOW())";
        // $cad_usuario = $conn->prepare($query);
        // $cad_usuario->execute();

        //Colocar a variável com valore direto na Query
        // $nome = "Cesar 12";
        // $email = "cesar12@celke.com.br";
        // $senha = "123456";
        // $sists_usuario_id = 3;
        // $niveis_acesso_id = 3;

        // $query = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) 
        //         VALUES ('$nome', '$email', '$senha', $sists_usuario_id, $niveis_acesso_id, NOW())";
        // $cad_usuario = $conn->prepare($query);
        // $cad_usuario->execute();

        // Atribuir o link na query e substituir o link com bindParam
        // Instrução recomendada
        $nome = "Cesar17";
        $email = "cesar@celke.com.br";
        $senha = "123456";
        $sists_usuario_id = 3;
        $niveis_acesso_id = 3;

        $query = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) 
                VALUES (:nome, :email, :senha, :sists_usuario_id, :niveis_acesso_id, NOW())";
        $cad_usuario = $conn->prepare($query);
        $cad_usuario->bindParam(":nome", $nome, PDO::PARAM_STR);
        $cad_usuario->bindParam(":email", $email, PDO::PARAM_STR);
        $cad_usuario->bindParam(":senha", $senha, PDO::PARAM_STR);
        $cad_usuario->bindParam(":sists_usuario_id", $sists_usuario_id, PDO::PARAM_INT);
        $cad_usuario->bindParam(":niveis_acesso_id", $niveis_acesso_id, PDO::PARAM_INT);

        $cad_usuario->execute();

        if ($cad_usuario->rowCount()){
            echo "Usuário cadastrado com sucesso!";
            var_dump($cad_usuario->rowCount());
            var_dump($conn->lastInsertId());
        } else {
            echo "Erro: usuário não cadastrado";
        }


    ?>

</body>
</html>

