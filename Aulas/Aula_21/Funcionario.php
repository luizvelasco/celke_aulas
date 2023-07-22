<?php

class Funcionario 
{
    public string $nome;
    public float $salario;
    private string $salarioConvertido;

    public function verSalario(): string
    {
        return "O funcionário {$this->nome} tem o salário R$ {$this->converterSalario($this->salario)}";
    }

    private function converterSalario(float $salario): string
    {
        $this->salarioConvertido = number_format($salario, '2', ',', '.');
        return $this->salarioConvertido; 
    }

}