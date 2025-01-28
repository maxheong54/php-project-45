<?php

namespace Php\Project\Games\BrainGame;

use function Php\Project\Engine\runGame;

const GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function runBrainGame(): void
{
    $getGameData = function (): array {
        $answers = ['yes', 'no'];
        $question = mt_rand(1, 100);
        $remainder = $question % 2;
        $correctAnswer = $answers[$remainder];
        return [$question, $correctAnswer];
    };

    runGame(GAME_RULES, $getGameData);
}
