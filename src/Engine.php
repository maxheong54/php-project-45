<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const TOTAL_ROUNDS = 3;

function runGame(string $gameRules, callable $getRoundData): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, $name!");

    for ($i = 0; $i < TOTAL_ROUNDS; $i++) {
        line($gameRules);
        [$question, $correctAnswer] = $getRoundData();
        line("Question: $question");
        $userAnswer = prompt("Your answer");

        if ($userAnswer !== $correctAnswer) {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }

        line("Correct!");
    }

    line("Congratulations, $name!");
}
