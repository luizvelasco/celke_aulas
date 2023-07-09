<?php

class Usuario 
{
    public string $nome;
    public string $email;
    public int $idade;

    public function cadastrar($nome, $email, $idade): string
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->idade = $idade;

        return "O usuário $this->nome tem o e-mail $this->email e $this->idade anos";
    }
}