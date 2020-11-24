<?php


namespace Nebelfitz\MathTraining\Domain;


class AdditionTask extends ElementaryMathematicTask
{

    public function getResult(): float
    {
        return $this->getFirstOperand() + $this->getSecondOperand();
    }

    public function getSymbol(): string
    {
        return '+';
    }


}
