<?php

class Bonus extends Funcionario
{
    public function verBonus()
    {
        return "O funcionário tem o bônus de R$ " . $this->bonusCalculado() . "<br>";
    }
}