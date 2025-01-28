<?php

namespace Php\Project\Games\CalcGame;

use function Php\Project\Engine\runGame;

const GAME_RULES = 'What is the result of the expression?';

function runCalcGame(): void
{
    $getGameData = function (): array {
        $firstOperand = mt_rand(1, 10);
        $secondOperand = mt_rand(1, 10);
        $operators = ['+', '-', '*'];
        $operatorIndex = mt_rand(0, 2);
        $currentOperator = $operators[$operatorIndex];

        $question = "{$firstOperand} {$currentOperator} {$secondOperand}";
        $correctAnswer = (string) calculateExpression(
            $firstOperand,
            $secondOperand,
            $currentOperator
        );

        return [$question, $correctAnswer];
    };

    runGame(GAME_RULES, $getGameData);
}

function calculateExpression(int $firstNum, int $secondNum, string $operator): int
{
    $result = null;
    switch ($operator) {
        case '+':
            $result = $firstNum + $secondNum;
            break;
        case '-':
            $result = $firstNum - $secondNum;
            break;
        case '*':
            $result = $firstNum * $secondNum;
            break;
    }
    return $result;
}
