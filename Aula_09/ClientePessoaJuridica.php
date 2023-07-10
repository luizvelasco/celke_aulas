<?php

class ClientePessoaJuridica extends Cliente 
{
    public int $cnpj;
    public string $nomeFantasia;

    public function verInformacaoEmpresa(): string 
    {
        $dados = "Endereço da pessoa jurídica<br>";
        $dados .= "Endereco: {$this->logradouro}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        $dados .= "Cnpj: {$this->cnpj}<br>";
        $dados .= "Nome Fantasia: {$this->nomeFantasia}<br>";
        return "<p>$dados</p>";
    }
}