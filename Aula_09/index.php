<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heranças</title>
</head>
<body>
    <?php 
        require_once("Cliente.php");
        require_once("ClientePessoaFisica.php");
        require_once("ClientePessoaJuridica.php");
    
        $cliente = new Cliente();
        $cliente->logradouro = "Rua Lampadosa - A";
        $cliente->bairro = "Vila Progresso";

        echo $cliente->verEndereco();
        echo "<hr>";

        $clientePf = new ClientePessoaFisica();
        $clientePf->logradouro = "Rua Lampadosa - B";
        $clientePf->bairro = "Vila Progresso - B";
        $clientePf->nome = "Velasco";
        $clientePf->cpf = 12345678998;

        echo $clientePf->verInformacaoUsuario();
        echo "<hr>";

        $clientePj = new ClientePessoaJuridica();
        $clientePj->logradouro = "Rua Lampadosa - C";
        $clientePj->bairro = "Vila Progresso - C";
        $clientePj->nomeFantasia = "Velasco LTDA";
        $clientePj->cnpj = 12345678912345;

        echo $clientePj->verInformacaoEmpresa();
        echo "<hr>";
    ?>
</body>
</html>