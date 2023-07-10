<?php

class Cliente 
{
    public string $logradouro;
    public string $bairro;

    public function verEndereco(): string 
    {
        return "<p>Endereco: {$this->logradouro}<br>
                Bairro: {$this->bairro}</p>";
    }
}