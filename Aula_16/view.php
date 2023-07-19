<?php 
session_start();

ob_start();

// Receber o id do usuário
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
</head>
<body>

    <a href="index.php">Listar</a>
    <a href="create.php">Cadastrar</a>

    <h1>Detalhes do Usuário</h1>
    <?php

    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }

    // Verificar se o ID possui valor
    if (!empty($id)){
        // Incluir os arquivos
        require_once ("./Conn.php");
        require_once ("./User.php");

        // Instanciar a classe e criar o objeto
        $viewUser = new User();

        // Enviando o ID para o atributo id da classe User
        $viewUser->id = $id;

        // Instanciando o método visualizar
        $valueUser = $viewUser->view();
        
        // Extraindo os valores do array
        extract($valueUser);

        // Imprimindo os valores
        echo "Id do usuário: $id<br>";
        echo "Nome do usuário: $nome<br>";
        echo "E-mail do usuário: $email<br>";
        echo "Criado em: " . date('d/m/Y H:i:s', strtotime($created)) . "<br>";
        
        // Verificando se o campo modificado está vazio para não impimí-lo
        echo "Editado em: ";
        if (!empty($modified)){
            echo date('d/m/Y H:i:s', strtotime($modified)) . "<br>";
        }
        echo "<hr>";

    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não encontrado!</p>";
        header("Location: index.php");
    }
    
    


    ?>
</body>
</html>