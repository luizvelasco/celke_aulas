<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke Select</title>
</head>
<body>
    <?php

        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "celke";
        $port = 3306;

        try {
            // Conexão com a porta
            // $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

            // Conexão sem a porta
            $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

            // echo "Conexão realizada com sucesso";
            
        } catch(PDOException $err){
            echo "Erro: Conexão não realizada. Erro gerado: " . $err->getMessage();
        }

        echo "<h2>Listar usuários</h2>";

        $query_usuarios = "SELECT id, nome, email, created, modified FROM usuarios";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            extract($row_usuario);

            echo "ID: " . $id . "<br>";
            echo "Nome: " . $nome . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "Cadastrado: " . date('d/m/Y H:i:s', strtotime($created)) . "<br>";
            echo "Editado: ";
            if (!empty($modified)){
                echo date('d/m/Y H:i:s', strtotime($modified)) . "<br>";
            }
            echo "<hr>";
        }

    ?>
</body>
</html>

