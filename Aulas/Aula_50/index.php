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

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($dados['SendCadUsuario'])) {
            $query = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) 
                        VALUES (:nome, :email, :senha, :sists_usuario_id, :niveis_acesso_id, NOW())";
            
            $cad_usuario = $conn->prepare($query);
            $cad_usuario->bindParam(":nome", $dados['nome'], PDO::PARAM_STR);
            $cad_usuario->bindParam(":email", $dados['email'], PDO::PARAM_STR);
            $senha_cripto = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $cad_usuario->bindParam(":senha", $senha_cripto, PDO::PARAM_STR);
            $cad_usuario->bindParam(":sists_usuario_id", $dados['sists_usuario_id'], PDO::PARAM_INT);
            $cad_usuario->bindParam(":niveis_acesso_id", $dados['niveis_acesso_id'], PDO::PARAM_INT);

            $cad_usuario->execute();

            if ($cad_usuario->rowCount()){
                echo "Usuário cadastrado com sucesso";
            } else {
                echo "Usuário NÃO cadastrado";
            }
        }
        
    ?>
    <form action="" method="POST">
        <label for="">Nome: </label>
        <input type="text" name="nome" placeholder="Nome Completo" required><br><br>

        <label for="">E-mail: </label>
        <input type="email" name="email" placeholder="E-mail" required><br><br>

        <label for="">Senha: </label>
        <input type="password" name="senha" placeholder="Senha" required><br><br>

        <label for="">Situação: </label>
        <input type="number" name="sists_usuario_id" placeholder="Situação do Usuário" required><br><br>

        <label for="">Nível de Acesso: </label>
        <input type="number" name="niveis_acesso_id" placeholder="Nível de acesso" required><br><br>

        <input type="submit" value="Cadatrar" name="SendCadUsuario">
    </form>

</body>
</html>

