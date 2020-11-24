<?php


namespace Nebelfitz\MathTraining\Domain;


class MultiplicationTask extends ElementaryMathematicTask
{
    public function getSymbol(): string
    {
        return '×';
    }

    public function getResult(): float
    {
        return $this->getFirstOperand() * $this->getSecondOperand();
    }
}
