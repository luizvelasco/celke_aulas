<?php

/**
 * A classe funcionario calcula o salário do colaborar
 * 
 * @author Velasco <luizvelasco@gmail.com>
 */
class Funcionario 
{
    /**
     * @var string $nome Recebe o nome do colaborador
     * @var float $salario Recebe o salario do colaborador
     * @var string $salarioConvertido Recebe o salario convertido para R$
     * @var float $bonus Recebe o bonus do colaborador
     */
    public string $nome;
    public float $salario;
    private string $salarioConvertido;
    protected float $bonus = 2500;

    /**
     * Criar a frase com o nome e o salário do colaborador
     * @return string Retorna a frase com o nome e o salário do colaborador
     */
    public function verSalario(): string
    {
        return "O funcionário {$this->nome} tem o salário R$ {$this->converterSalario($this->salario)}<br>";
    }

    /**
     * Recebe o salario e retorna convertido para R$
     * Método privado, somente pode ser chamado na classe
     * 
     * @param float $salario Deve ser enviado o parametro numerico
     * @return string Retorna o valor convertido para R$
     */
    private function converterSalario(float $salario): string
    {
        $this->salarioConvertido = number_format($salario, '2', ',', '.');
        return $this->salarioConvertido; 
    }

    /**
     * Método protegido, somente pode ser chamado na classe ou na classe filha
     *
     * @return string Retorna o bonus
     */
    protected function bonusCalculado(): string
    {
        return $this->converterSalario($this->bonus);
    }

}