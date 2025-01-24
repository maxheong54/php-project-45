<?php

namespace Php\Project\Games\BrainGame;

use function Php\Project\Engine\runGame;

function runBrainGame(): void
{
    $task = "What is the result of the expression?";
    $gameData = function (): array {
        $answers = ['yes', 'no'];
        $question = mt_rand(1, 100);
        $remainder = $question % 2;
        $correctAnswer = $answers[$remainder];
        return [$question, $correctAnswer];
    };

    runGame($task, $gameData);
}
