<?php


namespace Nebelfitz\MathTraining\Domain;


class DivisionWithRemainderTask extends DivisionTask
{
    public function __construct(int $seed1, int $seed2)
    {
        parent::__construct($seed1, $seed1);
        $remainder = random_int(0, $seed2 - 1);
        $this->firstOperand += $remainder;
    }

    public function getFormulaWithResult():string
    {
        $result = $this->getResult();
        $integerResult = floor($result);
        $remainder = (int)(($result - $integerResult) * $this->getSecondOperand());
        if ($remainder) {
            return $this->getFormulaWithoutResult() . ' ' .  $this->formatNumber($integerResult) . ' R ' . $this->formatNumber($remainder);
        } else {
            return parent::getFormulaWithResult();
        }
    }
}
