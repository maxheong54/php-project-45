<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

function runGame(string $task, callable $gameLogic): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, $name!");

    $totalRounds = 3;

    for ($i = 0; $i < $totalRounds; $i++) {
        line($task);
        [$question, $correctAnswer] = $gameLogic();
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
