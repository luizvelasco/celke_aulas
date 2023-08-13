<?php

namespace Core;

class ConfigView 
{
    private string $nome;
    private array $dados;

    public function __construct(string $nome, array $dados)
    {
        $this->nome = $nome;
        $this->dados = $dados;
    }

    public function renderizar()
    {
        if (file_exists('app/' . $this->nome . '.' . 'php')){
            include 'app/' . $this->nome . '.' . 'php';
        } else {
            echo 'Erro: Por favor tente novamente. Caso o erro persista, entre em contato com o Administrador luizvelasco@gmail.com';
        }
    }
}