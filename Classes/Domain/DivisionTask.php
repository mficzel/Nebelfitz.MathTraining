<?php


namespace Nebelfitz\MathTraining\Domain;


class DivisionTask extends ElementaryMathematicTask
{

    public function __construct(int $seed1, int $seed2)
    {
        parent::__construct($seed1 * $seed2, $seed1);
    }

    public function getSymbol(): string
    {
        return '÷';
    }

    public function getResult(): float
    {
        return $this->getFirstOperand() / $this->getSecondOperand();
    }
}
