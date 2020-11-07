<?php


namespace Nebelfitz\MathTraining\Domain;


class DivisionOperation implements MathematicOperation
{
    function evaluate(int $operand1, int $operand2): int
    {
        return (int)round($operand1 / $operand2);
    }

    function symbol(): string
    {
        return '÷';
    }
}
