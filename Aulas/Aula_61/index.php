<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - INNER JOIN</title>
</head>

<body>
    <h2>Listar Usuários</h2>

    <?php
        $query_usuarios =   "SELECT usr.id, 
                                        usr.nome, 
                                        usr.email, 
                                        sit.nome as nome_sit,
                                        niv.nome as nome_niv
                            FROM usuarios AS usr
                            INNER JOIN sists_usuarios AS sit
                                ON sit.id = usr.sists_usuario_id
                            INNER JOIN niveis_acessos AS niv
                                ON niv.id = usr. niveis_acesso_id
                            ORDER BY id DESC
                            LIMIT 40";

        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);
            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "Email: $email <br>";
            echo "Situação: $nome_sit <br>";
            echo "Nível de acesso: $nome_niv <br>";
            echo "<hr>";
        }

    ?>
   
</body>

</html>