<?php

namespace Nebelfitz\MathTraining\Domain;

use phpDocumentor\Reflection\DocBlockFactoryInterface;

abstract class ElementaryMathematicTask
{
    protected $firstOperand;

    protected $secondOperand;

    /**
     * ElementaryMathematicTask constructor.
     * @param int $firstOperand
     * @param int $secondOperand
     */
    public function __construct(int $seed1, int $seed2)
    {
        $this->firstOperand = $seed1;
        $this->secondOperand = $seed2;
    }

    abstract public function getSymbol(): string;

    abstract public function getResult(): float;

    public function getFirstOperand(): int
    {
        return $this->firstOperand;
    }

    public function getSecondOperand(): int
    {
        return $this->secondOperand;
    }



    public function getFormulaWithoutResult():string
    {
        return $this->formatNumber($this->getFirstOperand()) . ' ' . $this->getSymbol() . ' ' . $this->formatNumber($this->getSecondOperand()) . ' =';
    }

    public function getFormulaWithResult():string
    {
        return $this->getFormulaWithoutResult() . ' ' .  $this->formatNumber($this->getResult());
    }

    public function __toString():string
    {
        return $this->getFormulaWithResult();
    }

    protected function formatNumber($number): string
    {
        return number_format($number, 0, ',', '.');
    }

}
