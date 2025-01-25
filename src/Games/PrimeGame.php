<?php

namespace Php\Project\Games\PrimeGame;

use function Php\Project\Engine\runGame;

function runPrimeGame(): void
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = function (): array {
        $question = mt_rand(1, 100);
        $correctAnswer = 'yes';
        for ($i = 2; $i <= sqrt($question); $i++) {
            if ($question % $i === 0) {
                $correctAnswer = 'no';
                break;
            }
        }
        return [$question, $correctAnswer];
    };

    runGame($task, $gameData);
}
