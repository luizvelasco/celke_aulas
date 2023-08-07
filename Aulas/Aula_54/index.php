<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Update</title>
</head>
<body>
    <h2>Editar Usuários</h2>
    <?php

        // Salvar as informações do usuárioo no BD
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);   

        if (!empty($dados['SendUpUsuario'])) {
            //var_dump($dados);
            $query_up_usuario = "UPDATE usuarios 
                        SET nome=:nome, email=:email, senha=:senha, sists_usuario_id=:sists_usuario_id, niveis_acesso_id=:niveis_acesso_id, modified = NOW()
                        WHERE id=:id";
            $up_usuario = $conn->prepare($query_up_usuario);
            $up_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $up_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $senha_cript = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $up_usuario->bindParam(':senha', $senha_cript, PDO::PARAM_STR);
            $up_usuario->bindParam(':sists_usuario_id', $dados['sists_usuario_id'], PDO::PARAM_INT);
            $up_usuario->bindParam(':niveis_acesso_id', $dados['niveis_acesso_id'], PDO::PARAM_INT);
            $up_usuario->bindParam(':id', $dados['id'], PDO::PARAM_INT);

            if($up_usuario->execute()){
                echo "Usuário editado com sucesso!";
            }else{
                echo "Erro: Usuário não editado com sucesso!";
            }
        }

        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        // $id = 3;
        // Pesquisar os dados do usuário do BD
        $query_usuario = "SELECT id, nome, email, sists_usuario_id, niveis_acesso_id FROM usuarios WHERE id = :id";

        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(":id", $id, PDO::PARAM_INT);
        $result_usuario->execute();

        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        
        
        
    ?>
    <form action="" method="post">
        
        <?php
            $id = "";
            if (isset($row_usuario['id'])){
                $id = $row_usuario['id'];
            }

            $nome = "";
            if (isset($row_usuario['nome'])){
                $nome = $row_usuario['nome'];
            }

            $email = "";
            if (isset($row_usuario['email'])){
                $email = $row_usuario['email'];
            }

            $nome = "";
            if (isset($row_usuario['nome'])){
                $nome = $row_usuario['nome'];
            }

            $sists_usuario_id = "";
            if (isset($row_usuario['sists_usuario_id'])){
                $sists_usuario_id = $row_usuario['sists_usuario_id'];
            }

            $niveis_acesso_id = "";
            if (isset($row_usuario['niveis_acesso_id'])){
                $niveis_acesso_id = $row_usuario['niveis_acesso_id'];
            }
        ?>
        <input type="hidden" name="id" value="<?= $id?>">
        <div>
            <label for="">Nome: </label>
            <input type="text" name="nome" placeholder="Nome Completo" value="<?= $nome?>" required>
        </div>
        <div>
            <label for="">E-mail: </label>
            <input type="email" name="email" placeholder="E-mail" value="<?= $email?>" required>
        </div>
        <div>
            <label for="">Senha: </label>
            <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <div>
            <label for="">Situação do Usuário: </label>
            <input type="number" name="sists_usuario_id" placeholder="Situação do Usuário" value="<?= $sists_usuario_id?>" required>
        </div>
        <div>
            <label for="">Nível de acesso: </label>
            <input type="number" name="niveis_acesso_id" placeholder="Nível de Acesso" value="<?= $niveis_acesso_id?>" required>
        </div>
        <div>
            <input type="submit" value="Salvar" name="SendUpUsuario">
        </div>
    </form>

</body>
</html>

