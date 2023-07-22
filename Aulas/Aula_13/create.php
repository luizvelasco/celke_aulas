<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>

    <a href="index.php">Listar</a>
    <a href="create.php">Cadastrar</a>

    <h1>Cadastrar Usuário</h1>

    <?php
        require_once ("./Conn.php");
        require_once ("./User.php");

        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($formData['SendAddUser'])){
            $createUser = new User();
            $createUser->formData = $formData;
            $value = $createUser->create();

            if ($value) {
                $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
                header("Location: index.php");
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Usuário não cadastrado com sucesso</p>";
            } 
        }
    ?>

    <form name="CreateUser" action="" method="POST">
    <div>    
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome Completo" required>
    </div>
    <div>    
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="E-mail" required>
    </div>
    <input type="submit" value="Cadastrar" name="SendAddUser">
    </form>
</body>
</html>