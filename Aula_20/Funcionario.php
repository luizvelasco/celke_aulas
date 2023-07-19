<?php

class Funcionario 
{
    public string $nome;
    public float $salario;

    public function verSalario(): string
    {
        return "O funcionário {$this->nome} tem o salário R$ {$this->converterSalario($this->salario)}";
    }

    public function converterSalario(float $salario): string
    {
        return number_format($salario, '2', ',', '.');
    }
}