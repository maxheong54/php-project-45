<?php

namespace Php\Project\Games\CalcGame;

use function Php\Project\Engine\runGame;

function runCalcGame(): void
{
    $task = "What is the result of the expression?";
    $gameData = function (): array {
        $firstOperand = mt_rand(1, 10);
        $secondOperand = mt_rand(1, 10);
        $operators = ['+', '-', '*'];
        $operatorIndex = mt_rand(0, 2);

        $question = null;
        $correctAnswer = null;

        switch ($operators[$operatorIndex]) {
            case '+':
                $question = "$firstOperand + $secondOperand";
                $correctAnswer = $firstOperand + $secondOperand;
                break;
            case '-':
                $question = "$firstOperand - $secondOperand";
                $correctAnswer = $firstOperand - $secondOperand;
                break;
            case '*':
                $question = "$firstOperand * $secondOperand";
                $correctAnswer = $firstOperand * $secondOperand;
                break;
        }

        $correctAnswer = (string) $correctAnswer;
        return [$question, $correctAnswer];
    };

    runGame($task, $gameData);
}
