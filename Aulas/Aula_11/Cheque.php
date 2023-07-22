<?php

abstract class Cheque 
{
    public float $valor;
    public string $tipo;

    public function __construct(float $valor, string $tipo)
    {
        $this->valor = $valor;
        $this->tipo = $tipo;
    }

    abstract function calcularJuro(): string;

    public function converterReal (float $valor): string
    {
        return number_format($valor, '2', ',', '.');
        
    }
}