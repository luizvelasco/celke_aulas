<?php

/**
 * A classe bonus é classe filha da classe funcionario
 * @author Velasco
 */
class Bonus extends Funcionario
{
    /**
     * Método para ver o bonus
     * @return string retorna o bonus calculado
     */
    public function verBonus(): string
    {
        return "O funcionário tem o bônus de R$ " . $this->bonusCalculado() . "<br>";
    }
}