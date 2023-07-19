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
    <title>Editar</title>
</head>
<body>

    <a href="index.php">Listar</a>
    <a href="create.php">Cadastrar</a>

    <h1>Editar o usuário</h1>
    <?php

        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }

        // Incluir os arquivos
        require_once ("./Conn.php");
        require_once ("./User.php");

        // Receber os dados do usuário
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // Verifica se o usuário clicou no botão
        if (!empty($formData['SendEditUser'])){
            $editUser =  new User();
            $editUser->formData = $formData;
            $value = $editUser->edit();

            if ($value){
                $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso!</p>";
                header("Location: index.php");
            }else {
                echo "<p style='color:#f00;'>Erro: Usuário não editado!</p>";
            }
        }

        // Verificar se o ID possui valor
        if (!empty($id)){
            

            // Instanciar a classe e criar o objeto
            $viewUser = new User();

            // Enviando o ID para o atributo id da classe User
            $viewUser->id = $id;

            // Instanciando o método visualizar
            $valueUser = $viewUser->view();
            
            // Extraindo os valores do array
            extract($valueUser);

    ?>

    <form name="EditUser" action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div>    
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome Completo" value="<?php echo $nome;?>" required>
        </div>
        <div>    
            <label>E-mail: </label>
            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email;?>" required>
        </div>
        <input type="submit" value="Editar" name="SendEditUser">
    </form>

    <?php

        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Usuário não encontrado!</p>";
            header("Location: index.php");
        }

    ?>
</body>
</html>