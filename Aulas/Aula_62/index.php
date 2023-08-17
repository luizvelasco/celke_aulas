<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - LEFT JOIN</title>
</head>

<body>
    <h2>Listar Usuários</h2>

    <?php
        $query_usuarios =   "SELECT     usr.id, 
                                        usr.nome, 
                                        usr.email,
                                        cont.telefone,
                                        cont.celular,
                                        ende.logradouro,
                                        ende.numero,
                                        ende.bairro,
                                        ende.cidade
                            FROM usuarios AS usr
                            LEFT JOIN contatos as cont
                                ON usr.id = cont.usuario_id
                            LEFT JOIN enderecos ende
                                ON usr.id = ende.usuario_id
                            ORDER BY id asc";
                            

        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);
            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "Email: $email <br>";
            echo "Telefone: $telefone <br>";
            echo "Celular: $celular <br>";
            echo "Logradouro: $logradouro, Nº $numero <br>";
            echo "Bairro: $bairro <br>";
            echo "Cidade: $cidade <br>";

            echo "<hr>";
        }

    ?>
   
</body>

</html>