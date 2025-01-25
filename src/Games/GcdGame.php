<?php

namespace Php\Project\Games\GcdGame;

use function Php\Project\Engine\runGame;

function runGcdGame(): void
{
    $task = "Find the greatest common divisor of given numbers.";

    $gameData = function (): array {
        $firstNum = mt_rand(1, 100);
        $secondNum = mt_rand(1, 100);
        $question = "$firstNum $secondNum";
        $correctAnswer = null;

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

        $correctAnswer = (string) $secondNum;
        return [$question, $correctAnswer];
    };

    runGame($task, $gameData);
}
