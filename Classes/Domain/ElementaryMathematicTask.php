<?php

namespace Nebelfitz\MathTraining\Domain;

class ElementaryMathematicTask
{
    const ADDITION = 0;
    const SUBTRACTION = 0;
    const MULTIPICATION = 0;
    const DIVISION = 0;

    protected $firstOperand;

    protected $secondOperand;

    protected $operation;

    /**
     * ElementaryMathematicTask constructor.
     * @param int $firstOperand
     * @param int $secondOperand
     * @param MathematicOperation $operation
     */
    public function __construct(int $firstOperand, int $secondOperand, MathematicOperation $operation)
    {
        $this->firstOperand = $firstOperand;
        $this->secondOperand = $secondOperand;
        $this->operation = $operation;
    }

    public function getWithoutResult():string
    {
        return $this->formatNumber($this->firstOperand). ' ' .$this->operation->symbol() . ' ' . $this->formatNumber($this->secondOperand) . ' =';
    }

    public function __toString():string
    {
        return $this->formatNumber($this->firstOperand) . ' ' .$this->operation->symbol() . ' ' . $this->formatNumber($this->secondOperand) . ' = ' . $this->formatNumber($this->operation->evaluate($this->firstOperand,  $this->secondOperand));
    }

    protected function formatNumber($number): string
    {
        return number_format($number, 0, ',', '.');
    }


}
