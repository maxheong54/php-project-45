<?php

namespace Php\Project\Games\GcdGame;

use function Php\Project\Engine\runGame;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';

function runGcdGame(): void
{
    $getGameData = function (): array {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $question = "$firstNum $secondNum";
        $correctAnswer = (string) calculateGCD($firstNum, $secondNum);

        return [$question, $correctAnswer];
    };

    runGame(GAME_RULES, $getGameData);
}

function calculateGCD(int $firstNum, int $secondNum): int
{
    [$firstNum, $secondNum] = [
        max($firstNum, $secondNum),
        min($firstNum, $secondNum)
    ];
    $reminder = $firstNum % $secondNum;

    while (true) {
        if ($reminder !== 0) {
            $firstNum = $secondNum;
            $secondNum = $reminder;
            $reminder = $firstNum % $secondNum;
        } else {
            break;
        }
    }

    return $secondNum;
}
