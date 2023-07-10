<?php

Class Conn 
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "celke";
    public $port = 3306;
    public $connect = null;

    public function conectar(){
        try {
            $this->connect = new PDO("mysql:dbname=" . $this->dbname . ";host=" . $this->host, $this->user, $this->pass);
            return $this->connect;
        } catch (Exception $err) {
            echo "Erro: Conexão não realizada com sucesso. Erro gerado: $err";
            return false;
        }
    }
}