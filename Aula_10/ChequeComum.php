<?php

class ChequeComum extends Cheque
{
    public function calcularJuro(): string 
    {
        return "Valor do cheque {$this->tipo} é R$ {$this->valor}<hr>";
    }
}