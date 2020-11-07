<?php
namespace Nebelfitz\MathTraining\FusionObjects;

use Nebelfitz\MathTraining\Domain\AdditionOperation;
use Nebelfitz\MathTraining\Domain\DivisionOperation;
use Nebelfitz\MathTraining\Domain\ElementaryMathematicTask;
use Nebelfitz\MathTraining\Domain\MultiplicationOperation;
use Nebelfitz\MathTraining\Domain\SubstractionOperation;
use Neos\Fusion\FusionObjects\AbstractFusionObject;

class ArtithmeticTaskGeneratorImplementation extends AbstractFusionObject
{
    public function evaluate()
    {
        $number = $this->fusionValue('number') ?? 20;
        $maximalOperand = $this->fusionValue('maximalOperand') ?? 10;

        $elementaryArithmeticTypes = $this->fusionValue('elementaryArithmeticTypes') ?? ['addition'];
        $additionalFactors = $this->fusionValue('additionalFactors') ?? [1];

        $result = [];
        while (count($result) < $number) {
            $firstOperand = random_int(1, $maximalOperand);
            $secondOperand = random_int(1, $maximalOperand);
            $hash = $firstOperand . ':' . $secondOperand;
            if (array_key_exists($hash, $result)) {
                continue;
            }

            $factorPos1 = random_int(0, count($additionalFactors) -1 );
            $factor1 = (int)$additionalFactors[$factorPos1];
            if ($factor1 <> 1) {
                $firstOperand *= $factor1;
            }

            $factorPos2 = random_int(0, count($additionalFactors) -1 );
            $factor2 = (int)$additionalFactors[$factorPos2];
            if ($factor2 <> 1) {
                $secondOperand *= $factor2;
            }

            $typePos = random_int(0, count($elementaryArithmeticTypes) -1 );
            $type = $elementaryArithmeticTypes[$typePos];
            switch ($type) {
                case 'addition':
                    $operation = new AdditionOperation();
                    break;
                case 'subtraction':
                    $operation = new SubstractionOperation();
                    $firstOperand = $secondOperand + $firstOperand;
                    break;
                case 'multiplication':
                    $operation = new MultiplicationOperation();
                    break;
                case 'division':
                    $operation = new DivisionOperation();
                    $firstOperand = $secondOperand * $firstOperand;
                    break;
                default:
                    $operation = null;
            }




            if ($operation) {
                $task = new ElementaryMathematicTask($firstOperand, $secondOperand, $operation);
                $result[$hash] = $task;
            }
        }

        return $result;
    }
}
