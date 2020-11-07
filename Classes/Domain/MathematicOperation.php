<?php

namespace Nebelfitz\MathTraining\Domain;

interface MathematicOperation
{
    function evaluate (int $operand1, int $operand2): int;

    function symbol (): string;
}
