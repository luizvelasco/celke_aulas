<?php

class ClientePessoaFisica extends Cliente 
{
    public string $nome;
    public int $cpf;

    public function verInformacaoUsuario(): string 
    {
        $dados = "Endereço da pessoa física<br>";
        $dados .= "Endereço: {$this->logradouro}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        $dados .= "Nome: {$this->nome}<br>";
        $dados .= "Cpf: {$this->cpf}<br>";

        return "<p>$dados</p>";
    }
}