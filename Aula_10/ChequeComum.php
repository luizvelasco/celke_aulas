<?php

class ChequeComum extends Cheque
{
    public function calcularJuro(): string 
    {
        // Parent indica que querso usar um método da classe pai
        //$valorConvReal = parent::converterReal($this->valor);

        // Calcular juros
        $valorComJuro = $this->valor + (0.20 * $this->valor);

        $valorConvReal = $this->converterReal($valorComJuro);

        return "Valor do cheque {$this->tipo} sem juro {$this->converterReal($this->valor)} com juro R$ {$valorConvReal}<hr>";
    }
}