<?php

class ChequeEspecial extends Cheque
{
    public function calcularJuro(): string 
    {

        // Calcular juros
        $valorComJuro = $this->valor + (0.40 * $this->valor);

        $valorConvReal = $this->converterReal($valorComJuro);

        return "Valor do cheque {$this->tipo} sem juro {$this->converterReal($this->valor)} com juro R$ {$valorConvReal}<hr>";
    }
}