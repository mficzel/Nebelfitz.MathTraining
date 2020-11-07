<?php


namespace Nebelfitz\MathTraining\Domain;


class SubstractionOperation implements MathematicOperation
{
    function evaluate(int $operand1, int $operand2): int
    {
        return $operand1 - $operand2;
    }

    function symbol(): string
    {
        return '-';
    }
}
