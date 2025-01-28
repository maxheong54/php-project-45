<?php

namespace Php\Project\Games\PrimeGame;

use function Php\Project\Engine\runGame;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrimeGame(): void
{
    $getGameData = function (): array {
        $question = mt_rand(1, 100);
        $correctAnswer = (isPrime($question)) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    runGame(GAME_RULES, $getGameData);
}

function isPrime(int $number): bool
{
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
