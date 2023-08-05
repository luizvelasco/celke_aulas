<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "celke";

    try {
        // Conexão sem a porta
        $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

        //echo "Conexão realizada com sucesso";
        
    } catch(PDOException $err){
        echo "Erro: Conexão não realizada. Erro gerado: " . $err->getMessage();
    }