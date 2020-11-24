<?php
namespace Nebelfitz\MathTraining\FusionObjects;

use Nebelfitz\MathTraining\Domain\AdditionTask;
use Nebelfitz\MathTraining\Domain\DivisionTask;
use Nebelfitz\MathTraining\Domain\DivisionWithRemainderTask;
use Nebelfitz\MathTraining\Domain\MultiplicationTask;
use Nebelfitz\MathTraining\Domain\SubstractionTask;
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
            $seed1 = random_int(1, $maximalOperand);
            $seed2 = random_int(1, $maximalOperand);

            $hash = $seed1 . ':' . $seed2;
            if (array_key_exists($hash, $result)) {
                continue;
            }

            $factorPos1 = random_int(0, count($additionalFactors) -1 );
            $factor1 = (int)$additionalFactors[$factorPos1];
            if ($factor1 <> 1) {
                $seed1 *= $factor1;
            }

            $factorPos2 = random_int(0, count($additionalFactors) -1 );
            $factor2 = (int)$additionalFactors[$factorPos2];
            if ($factor2 <> 1) {
                $seed2 *= $factor2;
            }

            $typePos = random_int(0, count($elementaryArithmeticTypes) -1 );
            $type = $elementaryArithmeticTypes[$typePos];
            switch ($type) {
                case 'addition':
                    $task = new AdditionTask($seed1, $seed2);
                    break;
                case 'subtraction':
                    $task = new SubstractionTask($seed1, $seed2);
                    break;
                case 'multiplication':
                    $task = new MultiplicationTask($seed1, $seed2);
                    break;
                case 'division':
                    $task = new DivisionTask($seed1, $seed2);
                    break;
                case 'divisionWithRemainder':
                    $task = new DivisionWithRemainderTask($seed1, $seed2);
                    break;
                default:
                    $task = null;
            }

            $result[$hash] = $task;
        }

        return $result;
    }
}
