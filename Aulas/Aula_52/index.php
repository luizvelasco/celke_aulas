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

            try {
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
                    unset($dados);
                } else {
                    echo "Usuário NÃO cadastrado";
                }
            } catch(PDOException $erro) {
                echo $erro->getMessage();
            }
            
        }
        
    ?>
    <form action="" method="POST">
        <label for="">Nome: </label>
        <?php
            $nome = "";
            $email = "";
            $senha = "";
            $sists_usuario_id = "";
            $niveis_acesso_id = "";

            
            if (isset($dados['nome'])){
                $nome = $dados['nome'];
            }

            if (isset($dados['email'])){
                $email = $dados['email'];
            }

            if (isset($dados['senha'])){
                $senha = $dados['senha'];
            }

            if (isset($dados['sists_usuario_id'])){
                $sists_usuario_id = $dados['sists_usuario_id'];
            }

            if (isset($dados['niveis_acesso_id'])){
                $niveis_acesso_id = $dados['niveis_acesso_id'];
            }
        ?>
        <input type="text" name="nome" placeholder="Nome Completo" value="<?php echo $nome?>" required><br><br>

        
        <label for="">E-mail: </label>
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email?>" required><br><br>

        <label for="">Senha: </label>
        <input type="password" name="senha" placeholder="Senha" value="<?php echo $senha?>" required><br><br>

        <?php
            $query_sists_usuario = "SELECT id, nome FROM sists_usuarios ORDER BY nome ASC";
            $result_sists_usuario = $conn->prepare($query_sists_usuario);
            $result_sists_usuario->execute();
        ?>
        <label for="">Situação: </label>
        <select name="sists_usuario_id" required>
                <option value="">Selecione</option>
                <?php 
                    while ($row_sist_usuario = $result_sists_usuario->fetch(PDO::FETCH_ASSOC)){
                        $select_sit_usuario = "";
                        if (isset($dados['sists_usuario_id']) AND ($dados['sists_usuario_id'] == $row_sist_usuario['id'])){
                            $select_sit_usuario = "selected";
                        }
                        echo "<option value='" . $row_sist_usuario['id'] . "'$select_sit_usuario>" . $row_sist_usuario['nome'] . "</option>";
                    }
                ?>
        </select>
        <br><br>
        <?php
            $query_niveis_acessos = "SELECT id, nome FROM niveis_acessos ORDER BY nome ASC";
            $result_niveis_acessos = $conn->prepare($query_niveis_acessos);
            $result_niveis_acessos->execute();
        ?>
        <label for="">Nível de Acesso: </label>
        <select name="niveis_acesso_id" required>
                <option value="">Selecione</option>
                <?php 
                    while ($row_nivel_acesso = $result_niveis_acessos->fetch(PDO::FETCH_ASSOC)){
                        $select_nivel_acesso = "";
                        if (isset($dados['niveis_acesso_id']) AND ($dados['niveis_acesso_id'] == $row_nivel_acesso['id'])){
                            $select_nivel_acesso = "selected";
                        }
                        echo "<option value='" . $row_nivel_acesso['id'] . "'$select_nivel_acesso>" . $row_nivel_acesso['nome'] . "</option>";
                    }
                ?>
        </select>
        <br><br>
        
        <input type="submit" value="Cadatrar" name="SendCadUsuario">
    </form>

</body>
</html>

