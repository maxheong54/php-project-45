<?php

namespace Php\Project\BrainGame;

use function cli\line;
use function cli\prompt;

function runBrainGame(): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, $name!");

    $answers = ['yes', 'no'];
    $neededRightAnswer = 3;

    for ($i = 0; $i < $neededRightAnswer; $i++) {
        line('Answer "yes" if the number is even, otherwise answer "no".');
        $question = mt_rand(0, 100);
        line("Question: $question");
        $userAnswer = prompt("Your answer");
        $correctAnswer = $answers[$question % 2];

        if ($userAnswer !== $correctAnswer) {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }

        line("Correct!");
    }

    line("Congratulations, $name!");
}
