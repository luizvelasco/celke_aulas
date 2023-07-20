<?php

class Funcionario 
{
    public string $nome;
    public float $salario;
    private string $salarioConvertido;
    protected float $bonus = 2500;

    public function verSalario(): string
    {
        return "O funcionário {$this->nome} tem o salário R$ {$this->converterSalario($this->salario)}<br>";
    }

    private function converterSalario(float $salario): string
    {
        $this->salarioConvertido = number_format($salario, '2', ',', '.');
        return $this->salarioConvertido; 
    }

    protected function bonusCalculado(): string
    {
        return $this->converterSalario($this->bonus);
    }

}